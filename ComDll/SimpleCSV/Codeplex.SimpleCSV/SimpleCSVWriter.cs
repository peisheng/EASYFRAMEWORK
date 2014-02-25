using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;

namespace Codeplex.SimpleCSV
{
    /// <summary>
    /// A CSV writer
    /// </summary>
    public class SimpleCSVWriter : IDisposable
    {
        /// <summary>
        /// This is the CSV file column splitter. Default is ;
        /// </summary>
        private char _splitter = ';';

        /// <summary>
        /// The number of column on which we are operating
        /// </summary>
        private int _currentColumn = 0;

        /// <summary>
        /// The maximum number of columns that the CSV should contain. 0 - unlimited
        /// </summary>
        private int _maxColumns = 0;

        /// <summary>
        /// If the users has something written to file, then this value will be set to true
        /// </summary>
        private bool _somethingWasWritten = false;

        /// <summary>
        /// Number of rows read (with header row)
        /// </summary>
        private int _rowCount = 0;

        /// <summary>
        /// Determine, if the CSV should contain a header line
        /// </summary>
        private bool _hasHeader = false;

        /// <summary>
        /// All fields will be quoted 
        /// </summary>
        private bool _quoteAll = false;

        private StreamWriter _writer = null;

        /// <summary>
        /// Remember header positions
        /// </summary>
        private Dictionary<string, int> _headerDictionary = null;

        /// <summary>
        /// Remember the values
        /// </summary>
        private SortedDictionary<int, string> _cellDictionary = new SortedDictionary<int, string>();

        /// <summary>
        /// Write CSV results to another stream
        /// </summary>
        /// <param name="stream"></param>
        public SimpleCSVWriter(Stream stream)
        {
            _writer = new StreamWriter(stream);
        }

        /// <summary>
        /// Write CSV results to another stream with encoding
        /// </summary>
        /// <param name="stream">Base stream where the CSV should be written</param>
        /// <param name="encoding"></param>
        public SimpleCSVWriter(Stream stream, Encoding encoding)
        {
            _writer = new StreamWriter(stream, encoding);
        }

        /// <summary>
        /// Write CSV to a file path
        /// </summary>
        /// <param name="path">File path where the CSV should be written</param>
        public SimpleCSVWriter(string path)
        {
            _writer = new StreamWriter(path);
        }

        /// <summary>
        /// Write CSV to a file path with specified encoding
        /// </summary>
        /// <param name="path"></param>
        /// <param name="encoding"></param>
        public SimpleCSVWriter(string path, Encoding encoding)
        {
            _writer = new StreamWriter(path, false, encoding);
        }

        /// <summary>
        /// Appent CSV to an existing data file with specified encoding
        /// </summary>
        /// <param name="path"></param>
        /// <param name="append"></param>
        /// <param name="encoding"></param>
        public SimpleCSVWriter(string path, bool append, Encoding encoding)
        {
            _writer = new StreamWriter(path, append, encoding);
        }

        /// <summary>
        /// CSV column splitter. Can be changed till wirst write
        /// </summary>
        public char Splitter
        {
            get { return _splitter; }
            set
            {
                if (_somethingWasWritten) throw new InvalidOperationException("The splitter character can be changed, before any write.");
                _splitter = value;
            }
        }

        /// <summary>
        /// Returns the status, if something was written to the CSV
        /// </summary>
        public bool SomethingWasWritten { get { return _somethingWasWritten; } }

        /// <summary>
        /// The current written column in CSV
        /// </summary>
        public int CurrentColumn
        {
            get { return _currentColumn; }
        }

        /// <summary>
        /// Quote all fields
        /// </summary>
        public bool QuoteAll
        {
            get { return _quoteAll; }
            set
            {
                if (_somethingWasWritten) throw new InvalidOperationException("Quotation mode can be set only when nothing was written.");
                _quoteAll = true;
            }
        }


        /// <summary>
        /// Determine, that the CSV should contain a HeaderLine or return the info, if the header was written
        /// </summary>
        public bool HasHeader
        {
            get { return _hasHeader; }
            set
            {
                if (_somethingWasWritten) throw new InvalidOperationException("The HasHeader can be changed only, before any write.");
                _hasHeader = value;
            }
        }

        /// <summary>
        /// Write a CSV header (and skip to next line)
        /// </summary>
        /// <param name="header"></param>
        public void WriteHeader(string[] header)
        {
            if (_somethingWasWritten) throw new InvalidOperationException("The header could not be written, when something else was written.");

            int i = 1;
            _headerDictionary = new Dictionary<string, int>();

            foreach (var h in header)
            {
                this.Write(h);
                if (!_headerDictionary.ContainsKey(h)) _headerDictionary.Add(h, i);
                ++i;
            }
            WriteLine();
            _hasHeader = true;
        }

        /// <summary>
        /// Writes a value after last column
        /// </summary>
        /// <param name="value"></param>
        public void Write(string value)
        {
            _somethingWasWritten = true;

            if ((_maxColumns > 0) && (_maxColumns < _currentColumn)) return;
            ++_currentColumn;

            if (_cellDictionary.ContainsKey(_currentColumn)) {
                _cellDictionary[_currentColumn] = value;
            } else {
                _cellDictionary.Add(_currentColumn, value);
            }
        }

        /// <summary>
        /// Writes a line to CSV stream
        /// </summary>
        /// <param name="values"></param>
        public void WriteLine(string[] values)
        {
            foreach (var value in values)
            {
                this.Write(value);
            }
            this.WriteLine();
        }

        /// <summary>
        /// Write string to i=th column (will be written to stream when WriteLine() called)
        /// </summary>
        /// <param name="i">Index of the column (starts from 1)</param>
        /// <returns></returns>
        public string this[int i]
        {
            get
            {
                if (!_cellDictionary.ContainsKey(i)) { return null; }
                return _cellDictionary[i];
            }
            set
            {
                if (_cellDictionary.ContainsKey(i))
                {
                    _cellDictionary[i] = value;
                }
                else
                {
                    _cellDictionary.Add(i, value);
                }

                if (_currentColumn < i) _currentColumn = i;
            }
        }

        /// <summary>
        /// Write string to column with a header label (will be written to stream when WriteLine() called)
        /// </summary>
        /// <param name="header">Column header name</param>
        /// <returns></returns>
        public string this[string header]
        {
            get
            {
                if (!_hasHeader) throw new InvalidOperationException("String indexer is available only, when the Header is specified");
                if (!_headerDictionary.ContainsKey(header)) throw new IndexOutOfRangeException("Specified header label does not exists");
                return this[_headerDictionary[header]];
            }
            set
            {
                if (!_hasHeader) throw new InvalidOperationException("String indexer is available only, when the Header is specified");
                if (!_headerDictionary.ContainsKey(header)) throw new IndexOutOfRangeException("Specified header label does not exists");
                this[_headerDictionary[header]] = value;
            }
        }

        /// <summary>
        /// Writes a line to CSV stream
        /// </summary>
        public void WriteLine()
        {
            var maxKey = _cellDictionary.Keys.Last();

            if (_maxColumns > 0) maxKey = _maxColumns;

            for (int i = 1; i <= maxKey; i++)
            {
                if (i > 1) _writer.Write(_splitter);

                if (_cellDictionary.ContainsKey(i))
                {
                    _writer.Write(EncodeString(_cellDictionary[i]));
                }
                
            }

            _writer.WriteLine();
            _cellDictionary.Clear();
            _somethingWasWritten = true;
            _currentColumn = 0;
            ++_rowCount;
        }

        /// <summary>
        /// The maximum number of columns that the CSV should contain. 0 - unlimited
        /// </summary>
        public int MaxColumns
        {
            get { return _maxColumns; }
            set { _maxColumns = value; }
        }

        /// <summary>
        /// Removes buffered cells that should be written
        /// </summary>
        public void ClearBuffer()
        {
            _cellDictionary.Clear();
            _currentColumn = 0;
        }

        /// <summary>
        /// Clearts all bufers for the current writer and causes all byffered data to be written to the underlying stream
        /// </summary>
        public void Flush()
        {
            _writer.Flush();
        }

        /// <summary>
        /// Indicates the writer to flush its buffer after each WriteLine is executed 
        /// </summary>
        public bool AutoFlush
        {
            get { return _writer.AutoFlush; }
            set { _writer.AutoFlush = value; }
        }

        /// <summary>
        /// Encode string to a safe CSV format
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        private string EncodeString(string input)
        {
            if (input == null) return "";

            StringBuilder sb = new StringBuilder(input);
            bool a = input.Contains(@"""");
            bool b = input.Contains("\n") || input.Contains("\r") || input.Contains(_splitter);

            if (a) { sb.Replace(@"""", @""""""); }
            if (a || b || _quoteAll) { sb.Insert(0, @""""); sb.Append(@""""); }

            return sb.ToString();
        }

        /// <summary>
        /// Number of row written (with header row)
        /// </summary>
        public int RowCount { get { return _rowCount; } }

        #region IDisposable Members
        /// <summary>
        /// Dispose the writer
        /// </summary>
        public void Dispose()
        {
            _writer.Flush();
            _writer.Dispose();
        }

        #endregion
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;

namespace Codeplex.SimpleCSV
{
    /// <summary>
    /// A CSV reader
    /// </summary>
    public class SimpleCSVReader : IDisposable
    {
        /// <summary>
        /// This is the CSV file column splitter. Default is ;
        /// </summary>
        private char _splitter = ';';

        /// <summary>
        /// If the users has something read , then this value will be set to true
        /// </summary>
        private bool _somethingWasRead = false;

        /// <summary>
        /// Determine, if the CSV should contain a header line
        /// </summary>
        private bool _hasHeader = false;

        /// <summary>
        /// Remember the header (when the header was read)
        /// </summary>
        private Dictionary<string, int> _headerMap = new Dictionary<string,int>();

        public Dictionary<string, int> HeaderMap
        {
            get { return _headerMap; }
        }

        /// <summary>
        /// Remember the values
        /// </summary>
        private SortedDictionary<int, string> _cellDictionary = new SortedDictionary<int, string>();

        /// <summary>
        /// Number of rows read (with header row)
        /// </summary>
        private int _rowCount = 0;

        private StreamReader _reader = null;

        /// <summary>
        /// Read CSV data from a stream
        /// </summary>
        /// <param name="stream"></param>
        public SimpleCSVReader(Stream stream)
        {
            _reader = new StreamReader(stream);
        }

        /// <summary>
        /// Read CSV data from a stream with specified encoding
        /// </summary>
        /// <param name="stream"></param>
        /// <param name="encoding"></param>
        public SimpleCSVReader(Stream stream, Encoding encoding)
        {
            _reader = new StreamReader(stream, encoding);
        }

        /// <summary>
        /// Read CSV data from a file path
        /// </summary>
        /// <param name="path"></param>
        public SimpleCSVReader(string path)
        {
            _reader = new StreamReader(path);
        }

        /// <summary>
        /// Read CSV data from a file path with specified encoding
        /// </summary>
        /// <param name="path"></param>
        /// <param name="encoding"></param>
        public SimpleCSVReader(string path, Encoding encoding)
        {
            _reader = new StreamReader(path, encoding);
        }

        /// <summary>
        /// CSV column splitter. Can be changed till first write (default is ;)
        /// </summary>
        public char Splitter
        {
            get { return _splitter; }
            set
            {
                if (_somethingWasRead) throw new InvalidOperationException("The splitter character can be changed, before any read.");
                _splitter = value;
            }
        }


        /// <summary>
        /// If true, then something was read from CSV (like header or line)
        /// </summary>
        public bool SomethingWasRead { get { return _somethingWasRead; } }

        /// <summary>
        /// Read header from CSV
        /// </summary>
        public void ReadHeader()
        {
            if (_somethingWasRead) throw new InvalidOperationException("The header could not be read, when something else was read.");
            ReadLine();
            ReadHeaderFromLastRead();
        }

        private void ReadHeaderFromLastRead()
        {
            _headerMap.Clear();

            foreach (var keyValue in _cellDictionary)
            {
                if (!_headerMap.ContainsKey(keyValue.Value))
                {
                    _headerMap.Add(keyValue.Value, keyValue.Key);
                }
            }

            _cellDictionary.Clear();
            _hasHeader = true;
        }

        /// <summary>
        /// Determine, that the CSV should contain a HeaderLine or return the info, if the header was read
        /// </summary>
        public bool HasHeader
        {
            get { return _hasHeader; }
            set
            {
                if (_somethingWasRead) throw new InvalidOperationException("The HasHeader can be changed only, before any read.");
                _hasHeader = value;
            }
        }

        /// <summary>
        /// Read line from CSV file, and return true, when there is a line, othervise false, when no data
        /// </summary>
        /// <returns></returns>
        public bool ReadLine()
        {
            // first we read a header line
            if (_hasHeader && !_somethingWasRead)
            {
                if (!ReadCsvLine()) return false;
                ReadHeaderFromLastRead();
            }

            return ReadCsvLine();
        }

        /// <summary>
        /// How many columns was read last time
        /// </summary>
        public int ColumnsCount { get { return _cellDictionary.Count; } }

        /// <summary>
        /// Returns a column value from last read or changes the value from last read without modyfying the stream
        /// </summary>
        /// <param name="i"></param>
        /// <returns>null when index out of range</returns>
        public string this[int i]
        {
            get
            {

                if (_cellDictionary.ContainsKey(i)) return _cellDictionary[i];
                return null;
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
            }
        }

        /// <summary>
        /// Returns a column value from last read by header name
        /// </summary>
        /// <param name="header"></param>
        /// <returns>null when column not exists</returns>
        public string this[string header]
        {
            get
            {
                if (!HasHeader) throw new InvalidOperationException("The header was not read.");

                if (_headerMap.ContainsKey(header))
                {
                    return this[_headerMap[header]];
                }
                
                return null;
            }
            set
            {
                if (!HasHeader) throw new InvalidOperationException("The header was not read.");

                if (_headerMap.ContainsKey(header))
                {
                    this[_headerMap[header]] = value;
                }

            }
        }

        /// <summary>
        /// For private use only - read a Line from CSV stream, and remember the line in _lastLine list
        /// </summary>
        /// <returns></returns>
        private bool ReadCsvLine()
        {
            _somethingWasRead = true;
            // clear the last line
            _cellDictionary.Clear();

            int columnCount = 1;

            StringBuilder column = new StringBuilder();

            // if we are in a quoted column, then this value will be true
            bool isQuoted = false;

            if (_reader.EndOfStream) return false;

            // read text line from base stream
            string line = _reader.ReadLine();

            if (String.IsNullOrEmpty(line)) return false;

            // foreach character
            for (int i = 0; i < line.Length; i++)
            {
                // if we are in a quoted state
                //if (isQuoted)
                //{
                //    // found quotation in a quoted string
                //    if (line[i] == '"')
                //    {
                //        // if a second quotation found then write a single quote char to output
                //        if ((i + 1 < line.Length) && line[i + 1] == '"')
                //        {
                //            ++i;
                //            column.Append(line[i]);
                //            if (i + 1 >= line.Length)
                //            {
                //               // column.Append("\r\n");
                //                do
                //                {
                //                    line = _reader.ReadLine();
                //                    column.Append("\r\n");
                //                } while (String.IsNullOrEmpty(line) && !_reader.EndOfStream);
                //                i = -1;
                //                continue;
                //            }
                //        }
                //        else
                //        {
                //            // this was a single quote char - so we return from the quotation string
                //            isQuoted = false;
                //            if (i + 1 >= line.Length)
                //            {
                //                _cellDictionary.Add(columnCount++, column.ToString());
                //                column = new StringBuilder();
                //            }
                //        }
                //    }
                //    else
                //    {
                //        column.Append(line[i]);
                //        if (i + 1 >= line.Length)
                //        {
                //            do
                //            {
                //                line = _reader.ReadLine();
                //                column.Append("\r\n");
                //            } while (String.IsNullOrEmpty(line) && !_reader.EndOfStream);
                //            i = -1;
                //        }
                //    }
                //}
                //else
                //{
                //    // we are not in a quoted state
                    if (line[i] == _splitter)
                    {
                        // if this character was a splitter, then add this to a column list
                        _cellDictionary.Add(columnCount++, column.ToString());
                        column = new StringBuilder();

                        if (i + 1 >= line.Length)
                        {
                            _cellDictionary.Add(columnCount++, column.ToString());
                        }
                    }
                    //else if (line[i] == '"')
                    //{
                    //    // change to quoted state
                    //    isQuoted = true;
                    //}
                    else
                    {
                        column.Append(line[i]);
                        if (i + 1 >= line.Length)
                        {
                            // this was the last character
                            _cellDictionary.Add(columnCount++, column.ToString());
                            column = new StringBuilder();
                        }
                    }
                //}
            }

            // read a single row
            ++_rowCount;

            return true;
        }

        /// <summary>
        /// Number of row read (with header row)
        /// </summary>
        public int RowCount { get { return _rowCount; } }

        #region IDisposable Members

        /// <summary>
        /// Dispose the reader
        /// </summary>
        public void Dispose()
        {
            _reader.Dispose();
        }

        #endregion
    }
}

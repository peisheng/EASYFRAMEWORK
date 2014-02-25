using System;
using System.Text;
using System.Collections.Generic;
using System.Linq;
using Microsoft.VisualStudio.TestTools.UnitTesting;

namespace Codeplex.SimpleCSV.Tests
{
    /// <summary>
    /// Summary description for UnitTest1
    /// </summary>
    [TestClass]
    public class UnitTest1
    {
        public UnitTest1()
        {
            //
            // TODO: Add constructor logic here
            //
        }

        private TestContext testContextInstance;

        /// <summary>
        ///Gets or sets the test context which provides
        ///information about and functionality for the current test run.
        ///</summary>
        public TestContext TestContext
        {
            get
            {
                return testContextInstance;
            }
            set
            {
                testContextInstance = value;
            }
        }

        #region Additional test attributes


        private static List<string[]> _simpleData = null;
        private static string[] _simpleHeader = new string[] { "HeaderA", "HeaderB", "HeaderC" };
        private static List<MyFirstCSVRecord> _myFirstCSVRecord = new List<MyFirstCSVRecord>();
        private static List<MySecondCSVRecord> _mySecondCSVRecord = new List<MySecondCSVRecord>();
        private static List<MyThirdCSVRecord> _myThirdCSVRecord = new List<MyThirdCSVRecord>();

        //
        // You can use the following additional attributes as you write your tests:
        //
        // Use ClassInitialize to run code before running the first test in the class
        [ClassInitialize()]
        public static void MyClassInitialize(TestContext testContext)
        {

            _simpleData = new List<string[]>();
            _simpleData.Add(new string[] { "1", "A", "1A" });
            _simpleData.Add(new string[] { "2", "B", "2B" });
            _simpleData.Add(new string[] { "3;", "4;", "34" });
            _simpleData.Add(new string[] { ";", null, null });
            _simpleData.Add(new string[] { ";", null, null, null, @"""" });
            _simpleData.Add(new string[] { ";", @"""", @"""This is quoted text""" });
            _simpleData.Add(new string[] { ";", @"""This
is na multiline", @"Next record with ""
This is quoted text""" });
            _simpleData.Add(new string[] { ";", @"""This;
is na multiline", @"Next record with ""
This is quoted text""" });

            _myFirstCSVRecord.Add(new MyFirstCSVRecord
            {
                ColumnA = "Column A Content",
                ColumnB = "Column B Content",
                ColumnC = @"Column ""C"" Content",
                Total = 123.12m
            });
            _myFirstCSVRecord.Add(new MyFirstCSVRecord
            {
                ColumnA = @"Multiline
content",
                ColumnB = @"B Multiline @""
Content",
                ColumnC = @"Column ""C"" Content",
                Total = 88.12m
            });

            _myFirstCSVRecord.Add(new MyFirstCSVRecord
            {
                ColumnA = @"Multiline;
content;
next;
line",
                ColumnB = @"B Multiline @""
Content",
                ColumnC = @"Column ""C"" Content",
                Total = 99m
            });

            // SECOND CSV DATA
            _mySecondCSVRecord.Add(new MySecondCSVRecord
            {
                ColumnA = "Column A Content 2",
                ColumnB = "Column 2 B Content",
                ColumnC = @"Column2  ""C"" 2 Content",
                Total = 123.12m
            });
            _mySecondCSVRecord.Add(new MySecondCSVRecord
            {
                ColumnA = @"Multiline
content 2",
                ColumnB = @"B Multiline @""
Content
2",
                ColumnC = @"Column ""C""2 Content",
                Total = 88.12m
            });

            _mySecondCSVRecord.Add(new MySecondCSVRecord
            {
                ColumnA = @"Multiline2;
content;
next2;
line",
                ColumnB = @"B Multiline @""
Content",
                ColumnC = @"Column ""C"" Content",
                Total = 99m
            });




            // THIRD CSV DATA
            _myThirdCSVRecord.Add(new MyThirdCSVRecord
            {
                ColumnA = "Column A 3Content 2",
                ColumnB = "Column 2 B Content",
                ColumnC = @"Column2 3 ""C"" 2 Content",
                Total = 153.12m
            });
            _myThirdCSVRecord.Add(new MyThirdCSVRecord
            {
                ColumnA = @"Multiline3
content 2",
                ColumnB = @"B Multiline3 @""
Content
2",
                ColumnC = @"Col3umn ""C""2 Content",
                Total = 188.12m
            });

            _myThirdCSVRecord.Add(new MyThirdCSVRecord
            {
                ColumnA = @"Multiline3;
content;
n3ext2;
line3",
                ColumnB = @"B Multiline 3@""
Content",
                ColumnC = @"Column ""C""3 Content",
                Total = 399m
            });

            _myThirdCSVRecord.Add(new MyThirdCSVRecord
            {
                ColumnA = @"Multiline3;
content;
n3ext2;""
line"" 3",
                ColumnB = @"B Multiline 3@""
Content",
                ColumnC = @"Column ""C""3 Content",
                Total = 123m,
                MyEnum = MyEnumeration.GroupC,
                NullabelValue = 123.45m
            });


        }
        //
        // Use ClassCleanup to run code after all tests in a class have run
        // [ClassCleanup()]
        // public static void MyClassCleanup() { }
        //
        // Use TestInitialize to run code before running each test 
        // [TestInitialize()]
        // public void MyTestInitialize() { }
        //
        // Use TestCleanup to run code after each test has run
        // [TestCleanup()]
        // public void MyTestCleanup() { }
        //
        #endregion

        [TestMethod]
        public void BasicReadWrite()
        {

            using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\BasicReadWrite.csv"))
            {
                foreach (var data in _simpleData)
                {
                    writer.WriteLine(data);
                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\BasicReadWrite.csv"))
            {
                int i = 0;
                while (reader.ReadLine())
                {
                    Assert.AreEqual(_simpleData[i].Length, reader.ColumnsCount);
                    Assert.AreEqual(_simpleData[i][0] ?? "", reader[1]);
                    Assert.AreEqual(_simpleData[i][1] ?? "", reader[2]);
                    Assert.AreEqual(_simpleData[i][2] ?? "", reader[3]);

                    ++i;
                }

                Assert.IsFalse(reader.HasHeader);
            }
        }

        [TestMethod]
        public void BasicReadWriteQuoted()
        {

            using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\BasicReadWriteQuoted.csv"))
            {
                writer.QuoteAll = true;

                foreach (var data in _simpleData)
                {
                    writer.WriteLine(data);
                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\BasicReadWriteQuoted.csv"))
            {
                int i = 0;
                while (reader.ReadLine())
                {
                    Assert.AreEqual(_simpleData[i].Length, reader.ColumnsCount);
                    Assert.AreEqual(_simpleData[i][0] ?? "", reader[1]);
                    Assert.AreEqual(_simpleData[i][1] ?? "", reader[2]);
                    Assert.AreEqual(_simpleData[i][2] ?? "", reader[3]);

                    ++i;
                }

                Assert.IsFalse(reader.HasHeader);
            }
        }

        [TestMethod]
        public void BasicReadWriteWithHeader()
        {

            using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\BasicReadWriteWithHeader.csv"))
            {
                writer.WriteHeader(_simpleHeader);

                foreach (var data in _simpleData)
                {
                    writer.WriteLine(data);
                }
            }

            // By manually executing ReadHeader
            using (SimpleCSVReader reader = new SimpleCSVReader(@".\BasicReadWriteWithHeader.csv"))
            {
                int i = 0;

                reader.ReadHeader();

                while (reader.ReadLine())
                {
                    Assert.AreEqual(_simpleData[i].Length, reader.ColumnsCount);
                    Assert.AreEqual(_simpleData[i][0] ?? "", reader[1]);
                    Assert.AreEqual(_simpleData[i][1] ?? "", reader[2]);
                    Assert.AreEqual(_simpleData[i][2] ?? "", reader[3]);

                    ++i;
                }

                Assert.IsTrue(reader.HasHeader);
            }

            // By setting flag HasHeader to true
            using (SimpleCSVReader reader = new SimpleCSVReader(@".\BasicReadWriteWithHeader.csv"))
            {
                int i = 0;

                reader.HasHeader = true;



                while (reader.ReadLine())
                {
                    Assert.AreEqual(_simpleData[i].Length, reader.ColumnsCount);
                    Assert.AreEqual(_simpleData[i][0] ?? "", reader[1]);
                    Assert.AreEqual(_simpleData[i][1] ?? "", reader[2]);
                    Assert.AreEqual(_simpleData[i][2] ?? "", reader[3]);

                    // check searching by header label
                    Assert.AreEqual(_simpleData[i][0] ?? "", reader[_simpleHeader[0]]);
                    Assert.AreEqual(_simpleData[i][1] ?? "", reader[_simpleHeader[1]]);
                    Assert.AreEqual(_simpleData[i][2] ?? "", reader[_simpleHeader[2]]);
                    Assert.IsNull(reader["Some non existing header"]);

                    ++i;
                }

                Assert.IsTrue(reader.HasHeader);
            }
        }

        [TestMethod]
        public void MyFirstCSVRecordNoHeaderSerialization()
        {
            // serialization with no header
            using (SimpleCSVSerializer<MyFirstCSVRecord> serializer = new SimpleCSVSerializer<MyFirstCSVRecord>())
            {
                using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\MyFirstCSVRecordNoHeader.csv"))
                {

                    foreach (var record in _myFirstCSVRecord)
                    {
                        serializer.Serialize(writer, record);
                    }
                }

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyFirstCSVRecordNoHeader.csv"))
                {
                    MyFirstCSVRecord record;
                    int i = 0;
                    while (serializer.DeserializeLine<MyFirstCSVRecord>(reader, out record))
                    {
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnA, record.ColumnA);
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnB, record.ColumnB);
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnC, record.ColumnC);
                        Assert.AreEqual(_myFirstCSVRecord[i].Total, record.Total);

                        ++i;
                    }


                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyFirstCSVRecordNoHeader.csv"))
            {
                int line = 0;
                while (reader.ReadLine())
                {
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnA, reader[1]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnB, reader[2]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnC, reader[3]);
                    Assert.AreEqual(_myFirstCSVRecord[line].Total.ToString(), reader[4]);

                    ++line;
                }
            }
        }

        [TestMethod]
        public void MyFirstCSVRecordWithHeaderSerialization()
        {
            // serialization with no header
            using (SimpleCSVSerializer<MyFirstCSVRecord> serializer = new SimpleCSVSerializer<MyFirstCSVRecord>())
            {
                using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\MyFirstCSVRecordNoHeader.csv"))
                {
                    writer.HasHeader = true;

                    foreach (var record in _myFirstCSVRecord)
                    {
                        serializer.Serialize(writer, record);
                    }
                }

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyFirstCSVRecordNoHeader.csv"))
                {
                    reader.HasHeader = true;

                    MyFirstCSVRecord record;
                    int i = 0;
                    while (serializer.DeserializeLine<MyFirstCSVRecord>(reader, out record))
                    {
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnA, record.ColumnA);
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnB, record.ColumnB);
                        Assert.AreEqual(_myFirstCSVRecord[i].ColumnC, record.ColumnC);
                        Assert.AreEqual(_myFirstCSVRecord[i].Total, record.Total);

                        ++i;
                    }


                }
            }

            // Reading serialized CSV with standard read
            using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyFirstCSVRecordNoHeader.csv"))
            {
                int line = 0;
                reader.HasHeader = true;

                while (reader.ReadLine())
                {
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnA, reader[1]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnB, reader[2]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnC, reader[3]);
                    Assert.AreEqual(_myFirstCSVRecord[line].Total.ToString(), reader[4]);

                    // By column labels
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnA, reader["ColumnA"]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnB, reader["ColumnB"]);
                    Assert.AreEqual(_myFirstCSVRecord[line].ColumnC, reader["ColumnC"]);
                    Assert.AreEqual(_myFirstCSVRecord[line].Total.ToString(), reader["Total"]);

                    ++line;
                }
            }
        }

        [TestMethod]
        public void MySecondCSVRecordSerialization()
        {
            // serialization with no header
            using (SimpleCSVSerializer<MySecondCSVRecord> serializer = new SimpleCSVSerializer<MySecondCSVRecord>())
            {
                using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\MySecondCSVRecord.csv"))
                {
                    writer.HasHeader = true;
                    foreach (var record in _mySecondCSVRecord)
                    {
                        serializer.Serialize(writer, record);
                    }
                }

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\MySecondCSVRecord.csv"))
                {
                    reader.HasHeader = true;
                    MySecondCSVRecord record;
                    int i = 0;
                    while (serializer.DeserializeLine<MySecondCSVRecord>(reader, out record))
                    {
                        Assert.AreEqual(_mySecondCSVRecord[i].ColumnA, record.ColumnA);
                        Assert.AreEqual(_mySecondCSVRecord[i].ColumnB, record.ColumnB);
                        Assert.AreEqual(_mySecondCSVRecord[i].ColumnC, record.ColumnC);
                        Assert.AreEqual(_mySecondCSVRecord[i].Total, record.Total);

                        ++i;
                    }


                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\MySecondCSVRecord.csv"))
            {
                int line = 0;
                reader.HasHeader = true;
                while (reader.ReadLine())
                {
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnA, reader[1]);
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnB, reader[2]);
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnC, reader[3]);
                    Assert.AreEqual(_mySecondCSVRecord[line].Total.ToString(), reader[4]);

                    // Map by labelled columns
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnA, reader["A"]);
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnB, reader["B"]);
                    Assert.AreEqual(_mySecondCSVRecord[line].ColumnC, reader["C"]);
                    Assert.AreEqual(_mySecondCSVRecord[line].Total.ToString(), reader["Total"]);

                    ++line;
                }
            }
        }


        [TestMethod]
        public void MyThirdCSVRecordTest()
        {
            // serialization with no header
            using (SimpleCSVSerializer<MyThirdCSVRecord> serializer = new SimpleCSVSerializer<MyThirdCSVRecord>())
            {
                using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\MyThirdCSVRecord.csv"))
                {
                    writer.HasHeader = true;
                    foreach (var record in _myThirdCSVRecord)
                    {
                        serializer.Serialize(writer, record);
                    }
                }

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyThirdCSVRecord.csv"))
                {
                    reader.HasHeader = true;
                    MyThirdCSVRecord record;
                    int i = 0;
                    while (serializer.DeserializeLine<MyThirdCSVRecord>(reader, out record))
                    {
                        Assert.AreEqual(_myThirdCSVRecord[i].ColumnA, record.ColumnA);
                        Assert.AreEqual(_myThirdCSVRecord[i].ColumnB, record.ColumnB);
                        Assert.AreEqual(_myThirdCSVRecord[i].ColumnC, record.ColumnC);
                        Assert.AreEqual(_myThirdCSVRecord[i].Total, record.Total);

                        ++i;
                    }


                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\MyThirdCSVRecord.csv"))
            {
                int line = 0;
                reader.HasHeader = true;
                while (reader.ReadLine())
                {
                    Assert.IsTrue(String.IsNullOrEmpty(reader[1]));

                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnA, reader[2]);
                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnB, reader[3]);
                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnC, reader[4]);
                    Assert.AreEqual(_myThirdCSVRecord[line].Total.ToString(), reader[5]);

                    // Map by labelled columns
                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnA, reader["A"]);
                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnB, reader["B"]);
                    Assert.AreEqual(_myThirdCSVRecord[line].ColumnC, reader["C"]);
                    Assert.AreEqual(_myThirdCSVRecord[line].Total.ToString(), reader["Total"]);
                    Assert.AreEqual(_myThirdCSVRecord[line].NullabelValue.HasValue ? _myThirdCSVRecord[line].NullabelValue.Value.ToString() : String.Empty, reader["NullabelValue"]);

                    ++line;
                }
            }
        }

    }

    public class MyFirstCSVRecord
    {
        [SimpleCSV]
        public string ColumnA { get; set; }

        [SimpleCSV]
        public string ColumnB { get; set; }

        [SimpleCSV]
        public string ColumnC { get; set; }

        [SimpleCSV]
        public decimal Total { get; set; }
    }

    public class MySecondCSVRecord
    {

        [SimpleCSV(Label = "A")]
        public string ColumnA { get; set; }

        [SimpleCSV(Label = "B")]
        public string ColumnB { get; set; }

        [SimpleCSV(Label = "C")]
        public string ColumnC { get; set; }

        [SimpleCSV]
        public decimal Total { get; set; }
    }

    public class MyThirdCSVRecord
    {
        [SimpleCSV(Index=5)]
        public decimal Total { get; set; }

        /// <summary>
        /// This will be a second column
        /// </summary>
        [SimpleCSV(Label = "A")]
        public string ColumnA { get; set; }

        /// <summary>
        /// This will be a third column
        /// </summary>
        [SimpleCSV(Label = "B")]
        public string ColumnB { get; set; }

        /// <summary>
        /// This will be a fourth column
        /// </summary>
        [SimpleCSV(Label = "C")]
        public string ColumnC { get; set; }

        /// <summary>
        /// A nullable value
        /// </summary>
        [SimpleCSV(Index=6)]
        public decimal? NullabelValue { get; set; }

        /// <summary>
        /// Enumeration
        /// </summary>
        [SimpleCSV(Label="Enum", Index=7)]
        public MyEnumeration MyEnum { get; set; }

    }

    public enum MyEnumeration
    {
        [SimpleCSVEnum(Label="A")]
        GroupA,

        GroupB,

        [SimpleCSVEnum(Label = "C")]
        GroupC
    }
}

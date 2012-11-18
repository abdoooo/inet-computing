--------------------------------------------------------
--  File created - 星期二-十一月-29-2011   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ADMIN_TABLE
--------------------------------------------------------

  CREATE TABLE "11912682t"."ADMIN_TABLE" 
   (	"USERNAME" VARCHAR2(50 BYTE), 
	"PASSWORD" VARCHAR2(50 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table ADMIN
--------------------------------------------------------

  CREATE TABLE "11912682t"."ADMIN" 
   (	"ADMIN_ID" NUMBER, 
	"USERNAME" VARCHAR2(100 BYTE), 
	"PASSWORD" VARCHAR2(100 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table BOOKS
--------------------------------------------------------

  CREATE TABLE "11912682t"."BOOKS" 
   (	"ISBN" NUMBER(38,0), 
	"AUTHOR" VARCHAR2(500 BYTE), 
	"TITLE" VARCHAR2(500 BYTE), 
	"CAT_ID" NUMBER(38,0), 
	"PRICE" NUMBER(10,2), 
	"DESCR" VARCHAR2(1024 BYTE), 
	"DIST" VARCHAR2(10 BYTE), 
	"IMG" VARCHAR2(1024 BYTE), 
	"AVAB" VARCHAR2(25 BYTE), 
	"INDATE" DATE, 
	"PUBDATE" DATE, 
	"QTY" NUMBER(38,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table CATEGORIES
--------------------------------------------------------

  CREATE TABLE "11912682t"."CATEGORIES" 
   (	"CAT_ID" NUMBER(38,0), 
	"CAT_NAME" VARCHAR2(50 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table COMMENT_TABLE
--------------------------------------------------------

  CREATE TABLE "11912682t"."COMMENT_TABLE" 
   (	"COM_ID" NUMBER(38,0), 
	"CUST_ID" NUMBER(38,0), 
	"CONTENT" VARCHAR2(1024 BYTE), 
	"ISBN" NUMBER(38,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table CUSTOMERS
--------------------------------------------------------

  CREATE TABLE "11912682t"."CUSTOMERS" 
   (	"CUST_ID" NUMBER(38,0), 
	"NAME" VARCHAR2(50 BYTE), 
	"EMAIL" VARCHAR2(50 BYTE), 
	"ADDRESS" VARCHAR2(1024 BYTE), 
	"CITY" VARCHAR2(50 BYTE), 
	"COUNTRY" VARCHAR2(20 BYTE), 
	"CUST_PW" VARCHAR2(100 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table ORDER_ITEMS
--------------------------------------------------------

  CREATE TABLE "11912682t"."ORDER_ITEMS" 
   (	"ORDER_ID" NUMBER(38,0), 
	"ISBN" NUMBER(38,0), 
	"ITEM_PRICE" NUMBER(10,2), 
	"QTY" NUMBER(38,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table ORDERS
--------------------------------------------------------

  CREATE TABLE "11912682t"."ORDERS" 
   (	"ORDER_ID" NUMBER(38,0), 
	"AMOUNT" NUMBER(10,2), 
	"INDATE" DATE, 
	"ORDER_STAT" VARCHAR2(25 BYTE), 
	"SHIP_NAME" VARCHAR2(50 BYTE), 
	"SHIP_ADDRESS" VARCHAR2(1024 BYTE), 
	"SHIP_CITY" VARCHAR2(50 BYTE), 
	"SHIP_COUNTRY" VARCHAR2(20 BYTE), 
	"CUST_ID" NUMBER(38,0), 
	"TRACKING_ID" NUMBER(38,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
--------------------------------------------------------
--  DDL for Table TRACKING
--------------------------------------------------------

  CREATE TABLE "11912682t"."TRACKING" 
   (	"TRACKING_ID" NUMBER(38,0), 
	"TRACK_STAT" VARCHAR2(50 BYTE), 
	"ORDER_ID" NUMBER(38,0), 
	"INDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;
REM INSERTING into "11912682t".ADMIN_TABLE
SET DEFINE OFF;
Insert into "11912682t".ADMIN_TABLE (USERNAME,PASSWORD) values (' thomas ',' thomas');
Insert into "11912682t".ADMIN_TABLE (USERNAME,PASSWORD) values (' dickson ',' dickson');
REM INSERTING into "11912682t".ADMIN
SET DEFINE OFF;
Insert into "11912682t".ADMIN (ADMIN_ID,USERNAME,PASSWORD) values (2,'naomi','naomi');
Insert into "11912682t".ADMIN (ADMIN_ID,USERNAME,PASSWORD) values (0,'thomas','thomas');
Insert into "11912682t".ADMIN (ADMIN_ID,USERNAME,PASSWORD) values (1,'simon','simon');
REM INSERTING into "11912682t".BOOKS
SET DEFINE OFF;
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780195142945,'David H. Rakison','Early Category and Concept Development ',4,240,'Whether or not infants earliest perception of the world is a blooming, buzzing, confusion, it is not long before they come to perceive structure and order among the objects and events around them.','100','1322303691.jpg','Y',to_date('31-10月-10','DD-MON-RR'),to_date('29-10月-10','DD-MON-RR'),24);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780199766413,'Marjorie C. Malley','Radioactivity: A History of a Mysterious Science',1,250,'Mysterious from the start, radioactivity attracted researchers who struggled to understand it. What caused certain atoms to give off invisible, penetrating rays? Where did the energy come from? These questions became increasingly pressing when researchers realized the process seemed to continue indefinitely, producing huge quantities of energy. Investigators found cases where radioactivity did change, forcing them to the startling conclusion that radioactive bodies were transmuting into other substances. Chemical elements were not immutable after all. Radioactivity produced traces of matter so minuscule and evanescent that researchers had to devise new techniques and instruments to investigate them.','100','1321810873.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780061988349,'Mitchell Zuckoff','A True Story of Survival, Adventure, and the Most Incredible Rescue Mission of World War II',1,300,'On May 13, 1945, twenty-four American servicemen and WACs boarded a transport plane for a sightseeing trip over ???Shangri-La,??? a beautiful and mysterious valley deep within the jungle-covered mountains of Dutch New Guinea. Unlike the peaceful Tibetan monks of James Hilton???s bestselling novel Lost Horizon, this Shangri-La was home to spear-carrying tribesmen, warriors rumored to be cannibals.','100','1321810586.jpg','Y',to_date('02-11月-11','DD-MON-RR'),to_date('02-11月-11','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780199836864,'Peter Hart','Gallipoli ',1,250,'One of the most famous battles in history, the WWI Gallipoli campaign began as a bold move by the British to capture Constantinople, but this definitive new history explains that from the initial landings--which ended with so much blood in the sea it could be seen from airplanes overhead--to the desperate attacks of early summer and the battle of attrition that followed, it was a tragic folly destined to fail from the start. 
','100','1321810672.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780137064441,'Srinivasan S. Pillay','Winners Never Cheat: Even in Difficult Times, New and Expanded Edition',3,250,'In Your Brain and Business, Harvard psychiatrist Srinivasan S. Pillay reveals how the latest research in neuroscience can help you lead, communicate, and collaborate more effectively??? drive change more successfully??? move more rapidly from idea to execution??? coach colleagues or clients to unprecedented success! Your brain is your #1 asset: Optimize it to win!','100','1321812513.jpg','Y',to_date('02-8月 -11','DD-MON-RR'),to_date('03-8月 -11','DD-MON-RR'),21);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780548131961,'William T. Harris',' A Book On The Genesis Of The Categories Of The Mind',4,450,'his book is a facsimile reprint and may contain imperfections such as marks, notations, marginalia and flawed pages.','100','1322303866.jpg','Y',to_date('04-11月-09','DD-MON-RR'),to_date('02-11月-09','DD-MON-RR'),350);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780987090874,'Matthew Turland ','PHP Master',3,215,'PHP Master is tailor-made for the PHP developer who is serious about taking their server-side applications to the next level and who wants to really keep ahead of the game by adhering to best practice, employing the most effective object-oriented programming techniques, wrapping projects in layers of security and ensuring their code is doing its job perfectly.','100','1322305913.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('02-11月-09','DD-MON-RR'),14);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321814098,'Scott McNulty','The Google+ Guide',0,450,'This approachable, four-color book will offer readers a thorough guide to using Google+, Google answer to the challenge it faces from Facebook, Twitter, and all other ways people are being social on the web. After covering the fundamentals of being social on the web, the book digs into how to set up and manage Circles, control the Stream, share photos and video, use Hangouts, get the most out of Sparks, and use games. There will be  coverage of photography and building communities around photography. The book also covers using the iOS and Android Google+ apps. 
','100','1322491177.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),24);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781449301699,'Preston Gralla','Droid 2',3,250,'Ready to unleash the Droid 2? This entertaining guide helps you take full command of Motorola sleek new device to get online, shop, find locations, keep in touch, and much more. Every page is packed with useful information you can put to work right away, from setup to troubleshooting, with lots of valuable tips and tricks along the way.','100','1322492762.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),15);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781449393861,'Preston Gralla ','Droid X',3,250,'Get the most from your Droid X right away with this entertaining Missing Manual. Veteran tech author Preston Gralla offers a guided tour of every feature, with lots of expert tips and tricks along the way. You will learn how to use calling and texting features, take and share photos, enjoy streaming music and video, and much more.','100','1322493026.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781118148648,'Dan Gookin ','Droid X2 For Dummies ',3,230,'Google Android smartphones are getting smarter all the time, so this guide to the newest and smartest Droid arrives just in time. Bestselling For Dummies author Dan Gookin helps you stay a step ahead of your Droid X2 with Droid X2 For Dummies. In his legendary, easy-to-follow style, Dan covers all the bases, from setup and configuration to using all the phone features, texting, email, accessing the Internet, synching with a PC, using the camera, extending the battery, and even addresses expanding your Droid X2 with new software.','100','1322493138.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781466208681,'Gayle Laakmann McDowell','Cracking the Coding Interview',0,240,'Now in the 5th edition, Cracking the Coding Interview gives you the interview preparation you need to get the top software developer jobs. This is a deeply technical book and focuses on the software engineering skills to ace your interview. The book is over 500 pages and includes 150 programming interview questions and answers, as well as other advice. 

','100','1322493744.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780596517748,'Douglas Crockford','The Good Parts ',0,250,'Most programming languages contain good and bad parts, but JavaScript has more than its share of the bad, having been developed and released in a hurry before it could be refined. This authoritative book scrapes away these bad features to reveal a subset of JavaScript that more reliable, readable, and maintainable than the language as a whole-a subset you can use to create truly extensible and efficient code','100','1322493839.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),123);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780521280730,'Henri Tajfel','Studies in Social Psychology',4,240,'irst published in 1981, this volume presents studies on the social psychology of the relations and conflicts between social groups. Henri Tajfel played a central role in the development of social psychology in Europe, both in his own research and in his sponsorship of other European research. He has been particularly influential through his publications on various aspects of inter-group behaviour and a good deal of what he has written remains dispersed in a large number of different publications. This book presents a synthesis of some of this work, edited and structured to demonstrate its continuity and its cumulative importance. The book will be indispensable for social psychologists and should interest a wide range of political and social scientists.','100','1322301330.jpg','Y',to_date('01-12月-10','DD-MON-RR'),to_date('02-12月-10','DD-MON-RR'),20);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321774668,'Michael Wohl','Final Cut Pro X',0,450,'With this new release of Final Cut Pro, Apple has completely re-engineered its popular film and video editing software to include an incredible lineup of features intended to close the gap between the prosumers and the pros.','100','1322490328.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('01-11月-10','DD-MON-RR'),15);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780201633610,'Erich Gamma ','Design Patterns - Elements of Reusable Object-Oriented Software ',0,250,'Capturing a wealth of experience about the design of object-oriented software, four top-notch designers present a catalog of simple and succinct solutions to commonly occurring design problems. Previously undocumented, these 23 patterns allow designers to create more flexible, elegant, and ultimately reusable designs without having to rediscover the design solutions themselves. * The authors begin by describing what patterns are and how they can help you design object-oriented software. They then go on to systematically name, explain, evaluate, and catalog recurring designs in object-oriented systems. With Design Patterns as your guide, you will learn how these important patterns fit into the software development process, and how you can leverage them to solve your own design problems most efficiently.','100','1322493953.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780735619678,'Steve McConnell','A Practical Handbook of Software Construction ',0,250,'Widely considered one of the best practical guides to programming, Steve McConnell???s original CODE COMPLETE has been helping developers write better software for more than a decade. Now this classic book has been fully updated and revised with leading-edge practices???and hundreds of new code samples???illustrating the art and science of software construction. Capturing the body of knowledge available from research, academia, and everyday commercial practice, McConnell synthesizes the most effective techniques and must-know principles into clear, pragmatic guidance. No matter what your experience level, development environment, or project size, this book will inform and stimulate your thinking???and help you build the highest quality code.','100','1322494035.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),12);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780201485677,'Martin Fowler','Improving the Design of Existing Code',0,250,'Refactoring is about improving the design of existing code. It is the process of changing a software system in such a way that it does not alter the external behavior of the code, yet improves its internal structure. With refactoring you can even take a bad design and rework it into a good one. This book offers a thorough discussion of the principles of refactoring, including where to spot opportunities for refactoring, and how to set up the required tests. There is also a catalog of more than 40 proven refactorings with details as to when and why to use the refactoring, step by step instructions for implementing it, and an example illustrating how it works The book is written using Java as its principle language, but the ideas are applicable to any OO language.','100','1322494211.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780596007126,'Elisabeth Freeman','Head First Design Patterns ',3,150,'At any given moment, somewhere in the world someone struggles with the same software design problems you have. You know you donot want to reinvent the wheel (or worse, a flat tire), so you look to Design Patterns--the lessons learned by those who have faced the same problems. With Design Patterns, you get to take advantage of the best practices and experience of others, so that you can spend your time on...something else. Something more challenging. Something more complex. Something more fun.','100','1322494317.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321127426,'Martin Fowler','Patterns of Enterprise Application Architecture ',0,250,'Developers of enterprise applications (e.g reservation systems, supply chain programs, financial systems, etc.) face a unique set of challenges, different than those faced by their desktop system and embedded system peers. For this reason, enterprise developers must uncover their own solutions. In this new book, noted software engineering expert Martin Fowler turns his attention to enterprise application development. He helps professionals understand the complex -- yet critical -- aspects of architecture. While architecture is important to all application development, it is particularly critical to the success of an enterprise project, where issues such as performance and concurrent multi-user access are paramount. The book presents patterns in enterprise architecture, and the context provided by the author enables the reader to make the proper choices when faced with a difficult design decision','100','1322494399.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),23);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781933988276,'Roy Osherove','The Art of Unit Testing',3,140,'The Art of Unit Testing builds on top of what is already been written about this important topic. It guides you step by step from simple tests to tests that are maintainable, readable, and trustworthy. It covers advanced subjects like mocks, stubs, and frameworks such as Typemock Isolator and Rhino Mocks. And you will learn about advanced test patterns and organization, working with legacy code and even untestable code. The book discusses tools you need when testing databases and other technologies. It is written for .NET developers but others will also benefit from this book. ','100','1322494897.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),21);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321776617,'Jeff Carlson','Mac OS X Lion Pocket Guide',0,180,'The Mac OS X Lion Pocket Guide is an indispensable quick reference guide that is packed with bite-sized chunks of practical information for people who want to jump in and start working and playing with OS X Lion. The attractive price and accessible content make this the perfect learning companion and reference guide.','100','1321809679.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),100);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781433810930,'Shaun Wiley','Social Categories in Everyday Experience',3,450,'How do the social categories with which we identify, or to which others assign us, affect our psychological makeup, our social behaviors, and our life outcomes? The contributors to this edited volume answer this broad social psychological inquiry through their research on the social categories of gender and immigration, the intersectionality of these two social categories, and how people outside the two categories frame their conceptions of the two groups and of themselves.','100','1322301160.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('01-11月-10','DD-MON-RR'),20);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780863774928,'Koen Lamberts','Knowledge Concepts and Categories',4,120,'Knowledge, Concepts and Categories brings together an overview of recent research on concepts and knowledge that abstracts across a variety of specific fields of cognitive psychology. Readers will find data from many different areas: developmental psychology, formal modelling, neuropsychology, connectionism, philosophy, and so on. The book can be divided into three parts. Chapters 1 to 5 each contain a thorough and systematic review of a significant aspect of research on concepts and categories. Chapters 6 to 9 are concerned primarily with issues related to the taxonomy of human knowledge. Finally, Chapters 10 to 12 discuss formal models of categorization and function learning. ','100','1322302725.jpg','Y',to_date('01-6月 -11','DD-MON-RR'),to_date('08-6月 -11','DD-MON-RR'),15);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780125433471,'Brian H. Ross','The Psychology of Learning and Motivation',4,1000,'Broad topics including linguistics, the art of design, categorization of the social world, conversation, and classification are explored to provide the reader with an understanding of these steps one must take during his or her personal and social development. This title is a valuable resource for both psychology researchers and their students. ','100','1322302958.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('30-9月 -10','DD-MON-RR'),16);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781449309053,'David Pogue','Mac OS X Lion: The Missing Manual',0,210,'Get crystal-clear, jargon-free introduction to the Dock, the Mac OS X folder structure, Safari, Mail, and iCloud.','100','1321809512.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),100);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780805844917,'Lisa Gershkoff-Stowe','Building Object Categories in Developmental Time',4,500,'The study of object category development is a central concern in the field of cognitive science. Researchers investigating visual and auditory perception, cognition, language acquisition, semantics, neuroscience, and modeling have begun to tackle a number of different but centrally related questions concerning the representations and processes that underlie categorization and its development. This book covers a broad range of current research topics in category development. Its aim is to understand the perceptual and cognitive mechanisms that underlie category formation and how they change in developmental time.','100','1322303048.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('02-11月-11','DD-MON-RR'),15);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9783639030440,'Lysett Babocsai','When Vacuum Cleaners Bark and Dogs Buzz ',4,450,'The last 20 years have seen a logarithmic increase in infant developmental research. Infant categorization studies represent a key component of the overall modeling of infant conceptual development. Early categorization abilities are often explored in the visual modality. Because development occurs in a multimodal world, recent work in the area of intermodal perception tries to meet the demand of examining early modality integration. Studies document an early ability to establish intermodal relations and point to a close tie between intermodal perception and knowledge. ','100','1322304014.jpg','Y',to_date('30-8月 -11','DD-MON-RR'),to_date('01-8月 -11','DD-MON-RR'),24);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321336316,'Kevin R. Fall ','TCP/IP Illustrated',0,450,'or an engineer determined to refine and secure Internet operation or to explore alternative solutions to persistent problems, the insights provided by this book will be invaluable.','100','1322490742.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),123);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781118186183,'Paul McFedries ','MacBook Air Portable Genius',0,450,'Packed with tips and techniques on everything from getting started with the MacBook Air to taking advantage of all its remote features and accessories, this fun, hip, and portable guide has just what you need to confidently get started with the MacBook Air. In this latest edition, veteran author Paul McFedries covers an assortment of new topics including the new OS X Lion, Intel latest Sandybridge processor, Thunderbolt, and the backlit keyboard.','100','1322491340.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),123);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781118118191,'Julie Adair King ','Nikon D5100 For Dummies ',3,250,'Eager to take a shot at using the exciting new Nikon D5100? Then this is the introductory book for you! Aimed at first-time DSLR shooters who need a friendly guide on how to use their camera, this straightforward book is packed with full-color images that help demonstrate how to use features of the Nikon D5100. Coverage explores the on-board effects, low-light settings, and automatic HDR shooting. Clear explanations detail the ways in which you can use the new features of the Nikon D5100 to add unique shots to your portfolio while an explanation of photography terms gets you confident and savvy with this fun DSLR camera.','100','1322492847.jpg','Y',to_date('07-11月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780071783071,'Guy Hart-Davis ','How to Do Everything iPhone 4S',0,450,'How to Do Everything: iPhone 4S covers all the smartphone features of this brand-new version of Apple???s revolutionary device, as well how to use all of the iPhone???s other capabilities. This hands-on guide explains how to video chat using FaceTime, load music, videos, and data onto the iPhone, use email, surf the web, keep up with social media accounts, take photos, create and edit business documents, and much more. Find out how to fully exploit the iPhone with both Windows PCs and Macs. ','100','1322492631.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),23);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780262631150,'Ruth Garrett Millikan','New Foundations for Realism',3,300,'Preface by Daniel C. Dennett Beginning with a general theory of function applied to body organs, behaviors, customs, and both inner and outer representations, Ruth Millikan argues that the intentionality of language can be described without reference to speaker intentions and that an understanding of the intentionality of thought can and should be divorced from the problem of understanding consciousness. The results support a realist theory of truth and of universals, and open the way for a nonfoundationalist and nonholistic approach to epistemology.Ruth Millikan is Associate Professor of Philosophy at the University of Connecticut at Storrs. A Bradford Book.','100','1322301508.jpg','Y',to_date('01-8月 -11','DD-MON-RR'),to_date('02-8月 -11','DD-MON-RR'),20);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780735648715,'Microsoft Corporation','Microsoft Manual of Style',0,320,'Maximize the impact and precision of your message! Now in its fourth edition, the Microsoft Manual of Style provides essential guidance to content creators, journalists, technical writers, editors, and everyone else who writes about computer technology. ','100','1322489712.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('02-11月-10','DD-MON-RR'),25);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780132350884,'Robert C. Martin','A Handbook of Agile Software Craftsmanship ',0,250,'Noted software expert Robert C. Martin presents a revolutionary paradigm with Clean Code: A Handbook of Agile Software Craftsmanship. Martin has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code on the fly into a book that will instill within you the values of a software craftsman and make you a better programmer???but only if you work at it.','100','1322494600.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),12);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321712943,'Martin Fowler','Domain-Specific Languages',0,240,'When carefully selected and used, Domain-Specific Languages (DSLs) may simplify complex code, promote effective communication with customers, improve productivity, and unclog development bottlenecks. In Domain-Specific Languages, noted software development expert Martin Fowler first provides the information software professionals need to decide if and when to utilize DSLs. Then, where DSLs prove suitable, Fowler presents effective techniques for building them, and guides software engineers in choosing the right approaches for their applications','100','1322494961.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),24);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780470537558,'Andy Harris','HTML, XHTML & CSS All In One',1,150,'HTML5 is a language for structuring and presenting content for the World Wide Web, and is a core technology of the Internet originally proposed by Opera Software.','100','1321810169.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),100);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781400040155,'Adam Goodheart','1861: The Civil War Awakening',1,285,'The book introduces us to a heretofore little-known cast of Civil War heroes???among them an acrobatic militia colonel, an explorer???s wife, an idealistic band of German immigrants, a regiment of New York City firemen, a community of Virginia slaves, and a young college professor who would one day become president. Adam Goodheart takes us from the corridors of the White House to the slums of Manhattan, from the mouth of the Chesapeake to the deserts of Nevada, from Boston Common to Alcatraz Island, vividly evoking the Union at this moment of ultimate crisis and decision.','100','1321810970.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781590598047,'Michael Bowers','Pro CSS and HTML Design Patterns',1,200,'Applying design patterns to HTML and CSS allows web developers and designers to improve their work, in terms of efficiency/productivity and end results, so this is an essential book for anyone involved in the industry to own.','100','1321810432.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),100);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780470550472,'Doug Lemov','Teach Like a Champion: 49 Techniques that Put Students on the Path to College',2,180,'Teach Like a Champion offers effective teaching techniques to help teachers, especially those in their first few years, become champions in the classroom. These powerful techniques are concrete, specific, and are easy to put into action the very next day. Training activities at the end of each chapter help the reader further their understanding through reflection and application of the ideas to their own practice.','100','1321811852.jpg','Y',to_date('01-11月-10','DD-MON-RR'),to_date('01-11月-10','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781607149712,'Kaplan','Kaplan SSAT & ISEE 2012 Edition',2,180,'Every year, nearly 100,000 students take the Secondary School Admission Test (SSAT) or the Independent School Entrance Examination (ISEE) in order to gain admission to a top private school. Kaplan SSAT & ISEE 2012 provides the perfect mix of strategy and review for students looking to master these important exams. This comprehensive study guide provides students with all of the resources they need for test day preparation, and gives parents advice on how to help their children navigate what can be a daunting experience for first-time test takers.','100','1321811902.jpg','Y',to_date('02-11月-09','DD-MON-RR'),to_date('02-11月-09','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780205483921,'John A. Van de Walle','Elementary and Middle School Mathematics: Teaching Developmentally',2,180,'This leading K-8 math methods text has the most coverage of the NCTM standards, the strongest coverage of middle school mathematics, and the highest student approval of any text currently available. Elementary and Middle School Mathematics provides an unparalleled depth of ideas and discussion to help students develop a real understanding of the mathematics they will teach. John Van de Walle, one of the foremost experts on how children learn mathematics, finds that 80 percent of the students who purchase this book keep it for reference when they begin their professional teaching careers. This text reflects the NCTM Principles and Standards and the benefits of constructivist-or student-centered-mathematics instruction. Moreover, it is structured for maximum flexibility, offering 24 brief, compartmentalized chapters that may be mixed and matched to fit any course or teaching approach.','100','1321811957.jpg','Y',to_date('16-9月 -09','DD-MON-RR'),to_date('16-9月 -09','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780764554704,'Murray Shukyn','The GED For Dummies',2,180,'It???s probably dawned on you by now that, no matter how smart and knowledgeable you are, not having a high school diploma is a major obstacle to getting ahead in life. But you know it???s never too late to fill in that gap in your resume. One way to do it is by going back and finishing high school the old-fashioned way. Sounds like something out of a bad dream, doesn???t it? Then there???s the quicker, easier, and less humbling option of a General Educational Development diploma. And while the GED test isn???t too tough, it can be very tricky, especially if you haven???t taken a lot of standardized tests.','100','1321812026.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780137064441,'Srinivasan S. Pillay','Winners Never Cheat: Even in Difficult Times, New and Expanded Edition',3,250,'In Your Brain and Business, Harvard psychiatrist Srinivasan S. Pillay reveals how the latest research in neuroscience can help you lead, communicate, and collaborate more effectively??? drive change more successfully??? move more rapidly from idea to execution??? coach colleagues or clients to unprecedented success! Your brain is your #1 asset: Optimize it to win!','100','1321812581.jpg','Y',to_date('04-10月-11','DD-MON-RR'),to_date('04-10月-11','DD-MON-RR'),21);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781936719006,'Seth Godin','Poke the Box',3,210,'Poke the Box is a manifesto by bestselling author Seth Godin that just might make you uncomfortable. It???s a call to action about the initiative you???re taking-???in your job or in your life. Godin knows that one of our scarcest resources is the spark of initiative in most organizations (and most careers)-???the person with the guts to say, I want to start stuff.','100','1321812683.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),10);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780321706287,'Aaron Hillegass','Objective-C Programming',0,250,'Based on Big Nerd Ranch legendary Objective-C Bootcamp, this book covers C, Objective-C, and the common programming idioms that enable developers to make the most of Apple technologies. ','100','1322493667.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),12);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9780735658967,'Ashish Ghoda','XAML Developer Reference',0,320,'Work with XAML elements, attributes, and controls
Create user interfaces with the XAML layout system
Apply attached properties and dependency properties
Implement XAML markup extensions, including extensions specific to WPF. Customize the look of XAML elements with styles, and use triggers to control element behavior
Perform data binding in XAML while exploiting the benefits and avoiding the pitfalls. Build storyboards to create animations with XAML elements.
','100','1322305809.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),210);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781935182801,'Timothy Perrett ','The Simply Functional Web Framework for Scala ',3,250,'Lift in Action is a step-by-step exploration of the Lift framework. It moves through the subject quickly using carefully crafted, well-explained examples that make you comfortable from the start. This book is written for developers who are new to both Scala and Lift.','100','1322491238.jpg','Y',to_date('31-10月-11','DD-MON-RR'),to_date('31-10月-11','DD-MON-RR'),13);
Insert into "11912682t".BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,INDATE,PUBDATE,QTY) values (9781933952642,'Darrell Young','Mastering the Nikon D300/D300S ',3,250,'Mastering the Nikon D300/D300S, by Darrell Young, provides a wealth of experience-based information and insights for owners of these powerful and sophisticated cameras. Darrell is determined to help the user navigate past the confusion factor that often comes with complex but powerful new professional camera equipment.','100','1322493505.jpg','Y',to_date('01-11月-11','DD-MON-RR'),to_date('01-11月-11','DD-MON-RR'),13);
REM INSERTING into "11912682t".CATEGORIES
SET DEFINE OFF;
Insert into "11912682t".CATEGORIES (CAT_ID,CAT_NAME) values (0,'COMPUTING');
Insert into "11912682t".CATEGORIES (CAT_ID,CAT_NAME) values (1,'HISTORY');
Insert into "11912682t".CATEGORIES (CAT_ID,CAT_NAME) values (4,'HEALTH');
Insert into "11912682t".CATEGORIES (CAT_ID,CAT_NAME) values (2,'EDUCATION');
Insert into "11912682t".CATEGORIES (CAT_ID,CAT_NAME) values (3,'BUSINESS & INVESTING');
REM INSERTING into "11912682t".COMMENT_TABLE
SET DEFINE OFF;
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (41,58,'I like this book',9780321712943);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (42,59,'it''s good book',9780321712943);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (43,58,'very useful',9780321712943);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (59,20,'2222222222',9780201485677);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (35,59,'i read this book',9781449309053);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (40,53,'good book!',9780321712943);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (60,20,'33333333333333',9780201485677);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (61,20,'444444444444444',9780201485677);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (62,20,'555555555555555555555',9780201485677);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (32,53,'i suggest you read this',9781449309053);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (36,54,'like',9780321814098);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (37,60,'very like',9780321814098);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (38,20,'very help for my project',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (39,20,'you must read this',9780321706287);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (46,20,'qqqqqqqqqqqqqq',123);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (47,20,'aaaaaaaa',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (65,58,'ie very 7',9780061988349);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (51,20,'i lik too',9780061988349);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (48,20,'ddddddddd',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (33,20,'pls try read this',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (44,20,'good for yout life',9780321712943);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (49,20,'wwwwwwwwwwwwwwwwwwwww',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (50,15,'i kike this book!',9780061988349);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (52,20,'qqqqqqqqq',9780061988349);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (53,58,'fuck u',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (54,20,'qqqqqqqqq',9780061988349);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (63,20,'1111111111111111111',9780205483921);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (64,20,'22222222222222222222222222222',9780205483921);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (45,20,'dfsdfsdfsfdsd',123123);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (55,20,'wwwwwwwwwwwwww',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (34,20,'not good book',9780321706287);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (56,20,'11111111111111111111111',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (57,20,'11111111111111111111111',9780321127426);
Insert into "11912682t".COMMENT_TABLE (COM_ID,CUST_ID,CONTENT,ISBN) values (58,20,'111111111111',9780201485677);
REM INSERTING into "11912682t".CUSTOMERS
SET DEFINE OFF;
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (56,'123123123','123@123.com','123','123','123','12345');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (60,'bbb','biabiast@fakeinbox.com','bbb','bb','bb','bbbbb');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (61,'thomas','heihei8083@hotmail.com','Room S1201, 12/F, South Tower, PolyU West Kowloon Campus, 9 Hoi Ting Road, Yau Ma Tei, Kowloon','Hong Kong','Hong Kong','testing');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (53,'qweqwe','qweqwe@qwe.com','qweqwe','qweqwe','qweqwe','qweqwe');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (54,'asdasd','asdasd@asd.com','asdasd','asdasd','asdasd','asdasd');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (20,'thomas','test4test4test4@test.com','asdasdasd','12312312312',null,'123123');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (57,'1111','123@123.com','123','123','123','12345');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (58,'123123','lawtikshun999@yahoo.com.hk','123','123','123','123123');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (59,'wing','shirley111hk@yahoo.com.hk','Happy street','HK','Ch','12345');
Insert into "11912682t".CUSTOMERS (CUST_ID,NAME,EMAIL,ADDRESS,CITY,COUNTRY,CUST_PW) values (15,'ken','test3@gmail.com','xx','xxxx','xxx','123123');
REM INSERTING into "11912682t".ORDER_ITEMS
SET DEFINE OFF;
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (120,9780061988349,300,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (121,9780321776617,180,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (118,9780805844917,500,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (null,9780764554704,180,8);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (null,9781449309053,210,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (147,9780205483921,180,20);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (171,9781400040155,285,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (179,9780201633610,250,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (185,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (164,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (185,9780199766413,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (185,9780201485677,250,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (148,9780199836864,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (187,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (93,9781449309053,210,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (94,9781936719006,210,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (94,9780205483921,180,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (187,9780199766413,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (187,9780201485677,250,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (188,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (97,9781449309053,210,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (98,9781936719006,210,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (98,9780205483921,180,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (99,9781936719006,210,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (99,9780205483921,180,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (100,9781936719006,210,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (100,9780205483921,180,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (106,9780205483921,180,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (112,9781400040155,285,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (188,9780199766413,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (188,9780201485677,250,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (189,9780201485677,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (102,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (103,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (104,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (105,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (106,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (107,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (108,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (115,9780205483921,180,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (116,9780262631150,240,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (111,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (77,9780199836864,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (77,9780199766413,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (100,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (101,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (81,9780199836864,250,10);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (116,9780137064441,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (158,9780205483921,180,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (161,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (177,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (167,9780201633610,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (167,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (172,9780321127426,250,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (180,9780201485677,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (180,9780199766413,250,9);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (115,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (116,9781449309053,630,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (117,9781449309053,630,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (112,9781449309053,420,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (113,9781449309053,630,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (118,9781449309053,420,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (119,9781449309053,420,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (120,9781449309053,630,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (121,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (122,9781449309053,210,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (123,9781449309053,630,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (101,9780262631150,240,6);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (102,9780262631150,240,6);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (103,9780137064441,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (104,9780205483921,180,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (105,9780137064441,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (107,9780470537558,150,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (78,9780470537558,150,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (108,9783639030440,450,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (160,9780137064441,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (21,9780199766413,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (21,9780061988349,300,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (80,9780061988349,300,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (82,9781936719006,210,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (83,9781936719006,210,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (109,9781449309053,210,12);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (72,9781400040155,285,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (110,9781449309053,210,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (114,9781449309053,210,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (148,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (118,9780125433471,1000,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (125,9781400040155,285,6);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (149,9780201485677,250,3);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (150,9780201485677,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (151,9780201485677,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (152,9780201485677,250,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (153,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (154,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (155,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (156,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (157,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (159,9780061988349,300,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (160,9780201485677,250,2);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (181,9780199766413,250,9);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (175,9780201633610,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (175,9780321774668,450,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (181,9780201485677,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (182,9780201485677,250,4);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (182,9780199766413,250,9);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (73,9780470550472,180,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (73,9780205483921,180,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (117,9780137064441,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (122,9780805844917,500,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (111,9780205483921,180,5);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (123,9780205483921,180,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (null,9780596517748,250,7);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (null,9780596517748,250,7);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (146,9780596517748,250,7);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (165,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (166,9780201485677,250,1);
Insert into "11912682t".ORDER_ITEMS (ORDER_ID,ISBN,ITEM_PRICE,QTY) values (183,9780201485677,250,1);
REM INSERTING into "11912682t".ORDERS
SET DEFINE OFF;
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (23,100,to_date('10-10月-11','DD-MON-RR'),'CLOSE','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road, Tsuen Wan, NT','Tsuen Wan','Tsuen Wan',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (84,1050,to_date('28-9月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (85,1050,to_date('27-2月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (86,1050,to_date('28-2月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (87,990,to_date('28-1月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (88,990,to_date('28-11月-11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (89,990,to_date('28-9月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (90,9900,to_date('28-9月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (91,990,to_date('28-8月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (92,210,to_date('28-8月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (93,420,to_date('28-8月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (94,990,to_date('28-7月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (95,420,to_date('28-6月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (96,990,to_date('28-6月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (97,420,to_date('28-5月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (98,990,to_date('28-1月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (99,990,to_date('28-3月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (100,990,to_date('28-3月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (106,540,to_date('28-3月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (113,285,to_date('28-5月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (120,600,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (121,900,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (124,1000,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (147,3600,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (173,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (176,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (179,750,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (184,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (171,285,to_date('29-11月-11','DD-MON-RR'),'Delivering','wing','Happy street','HK','Ch',59,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (185,2050,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (186,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (187,2050,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (188,2050,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (189,1000,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (81,2500,to_date('28-5月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (112,285,to_date('28-6月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (115,360,to_date('28-6月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (116,3620,to_date('28-6月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (158,180,to_date('29-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (41,2150,to_date('26-7月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (77,500,to_date('27-8月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (162,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (168,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (169,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (170,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (172,750,to_date('29-11月-11','DD-MON-RR'),'Delivering','wing','Happy street','HK','Ch',59,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (177,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','hei','hong kong','tai po','hong kong',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (178,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (180,3250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (108,450,to_date('28-8月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (163,500,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (101,3240,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (102,3240,to_date('28-4月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (103,500,to_date('28-4月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (104,180,to_date('28-4月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (105,500,to_date('28-4月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (107,150,to_date('28-4月 -11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (119,1000,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (125,1710,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (148,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (149,750,to_date('29-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (150,1250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (82,1050,to_date('28-4月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (151,1250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (80,1500,to_date('28-4月 -11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (83,1050,to_date('28-11月-11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (109,2520,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (110,420,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (114,630,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (118,1000,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (152,1250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (153,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (154,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (155,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (156,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (157,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (159,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (160,500,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (164,300,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (174,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (175,3250,to_date('29-11月-11','DD-MON-RR'),'Delivering','wing','Happy street','HK','Ch',59,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (181,3250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (182,3250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (21,100,to_date('16-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road, Tsuen Wan, NT','Tsuen Wan','Tsuen Wan',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (22,100,to_date('25-10月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road, Tsuen Wan, NT','Tsuen Wan','Tsuen Wan',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (117,500,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (122,2500,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (123,180,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (144,1750,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (146,1750,to_date('28-11月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (161,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (165,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (166,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (167,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (183,250,to_date('29-11月-11','DD-MON-RR'),'Delivering','123123','123','123','123',58,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (69,2200,to_date('26-10月-11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (70,2200,to_date('27-10月-11','DD-MON-RR'),'Processing','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
Insert into "11912682t".ORDERS (ORDER_ID,AMOUNT,INDATE,ORDER_STAT,SHIP_NAME,SHIP_ADDRESS,SHIP_CITY,SHIP_COUNTRY,CUST_ID,TRACKING_ID) values (111,900,to_date('28-10月-11','DD-MON-RR'),'Delivering','test4','G/F., Win Cheung Hse, 131-137 Sha Tsui Road','Tsuen Wan','NT',20,null);
REM INSERTING into "11912682t".TRACKING
SET DEFINE OFF;
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (70,'HK',106,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (77,'HK',112,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (84,'HK',120,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (85,'HK',121,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (88,'HK',118,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (95,'HK',147,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (119,'HK',171,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (121,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (124,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (57,'HK',93,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (58,'HK',94,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (127,'HK',179,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (132,'HK',164,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (61,'HK',97,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (62,'HK',98,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (63,'HK',99,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (64,'HK',100,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (133,'HK',185,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (134,'HK',148,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (135,'HK',187,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (136,'HK',188,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (137,'HK',189,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (45,'HK',81,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (76,'HK',112,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (79,'HK',115,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (80,'HK',116,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (106,'HK',158,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (110,'HK',161,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (116,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (117,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (118,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (120,'HK',172,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (125,'HK',177,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (126,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (128,'HK',180,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (31,'US',21,to_date('16-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (32,'JPN',21,to_date('18-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (33,'HK',21,to_date('21-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (67,'HK',103,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (68,'HK',104,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (65,'HK',101,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (66,'HK',102,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (69,'HK',105,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (71,'HK',107,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (72,'HK',108,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (111,'HK',160,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (43,'Hong Kong',71,to_date('16-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (44,'HK',80,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (46,'HK',82,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (41,'Hong Kong',71,to_date('16-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (42,'HK',79,to_date('27-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (47,'HK',83,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (73,'HK',109,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (74,'HK',110,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (78,'HK',114,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (82,'HK',118,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (83,'HK',118,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (89,'HK',125,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (96,'HK',148,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (97,'HK',149,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (98,'HK',150,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (99,'HK',151,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (100,'HK',152,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (101,'HK',153,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (102,'HK',154,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (103,'HK',155,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (104,'HK',156,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (105,'HK',157,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (107,'HK',159,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (108,'HK',160,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (112,'HK',164,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (122,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (123,'HK',175,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (129,'HK',181,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (130,'HK',182,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (86,'HK',122,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (87,'HK',123,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (94,'HK',146,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (109,'HK',161,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (113,'HK',165,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (114,'HK',166,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (115,'HK',167,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (131,'HK',183,to_date('29-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (75,'HK',111,to_date('28-11月-11','DD-MON-RR'));
Insert into "11912682t".TRACKING (TRACKING_ID,TRACK_STAT,ORDER_ID,INDATE) values (81,'HK',117,to_date('28-11月-11','DD-MON-RR'));
--------------------------------------------------------
--  DDL for Index SYS_C00137937
--------------------------------------------------------

  CREATE UNIQUE INDEX "11912682t"."SYS_C00137937" ON "11912682t"."ADMIN" ("ADMIN_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS" ;

--------------------------------------------------------
--  Constraints for Table ADMIN
--------------------------------------------------------

  ALTER TABLE "11912682t"."ADMIN" ADD PRIMARY KEY ("ADMIN_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "STUDENTS"  ENABLE;



--------------------------------------------------------
--  Constraints for Table CUSTOMERS
--------------------------------------------------------

  ALTER TABLE "11912682t"."CUSTOMERS" MODIFY ("CUST_ID" NOT NULL ENABLE);













--------------------------------------------------------
--  DDL for Table BOOKS
--------------------------------------------------------

  CREATE TABLE "BOOKS" 
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
   )

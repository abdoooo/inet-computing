--------------------------------------------------------
--  DDL for Table ORDERS
--------------------------------------------------------

  CREATE TABLE "ORDERS" 
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
   )

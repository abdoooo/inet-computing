

insert into CUSTOMERS values(CUST_ID.NEXTVAL, 'test2', 'test2@gmail.com','a1','a2','a3','password');
insert into ORDER_ITEMS values(ORDER_ID.NEXTVAL, '456456', '100','3');


insert into ORDERS values(ORDER_ID.NEXTVAL, '10', to_date( '16-Nov-11', 'dd-mon-yy'),'CLOSE','test','','','','1',1);



insert into BOOKS values('9781451648539', 'Walter Isaacson', 'Steve Jobs [Hardcover]','1','100','Based on more than forty ....','10','http://tinyurl.com/76edt9z','Y',to_date( '16-Nov-11', 'dd-mon-yy'),to_date( '16-Oct-11', 'dd-mon-yy'),'10');

insert into COMMENT_TABLE values(COM_ID.NEXTVAL,1,'Good book, i like it!!!',9781451648539);


insert into TRACKING values (TRACKING_ID.NEXTVAL, 'Hong Kong', '3' ,to_date( '16-Nov-11', 'dd-mon-yy'));
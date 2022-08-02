CREATE TABLE buildingFrontdesk (
    Building char(20) PRIMARY KEY,
    Floor Integer
);

INSERT INTO buildingFrontdesk VALUES('east tower',7);
INSERT INTO buildingFrontdesk VALUES('south tower',6);
INSERT INTO buildingFrontdesk VALUES('west tower',8);
INSERT INTO buildingFrontdesk VALUES('north tower',7);
INSERT INTO buildingFrontdesk VALUES('main tower',10);

CREATE TABLE FrontDesk(
    deskNum INTEGER PRIMARY KEY,
    Building char(20),
    FOREIGN KEY (building) REFERENCES buildingFrontdesk(building)
);

INSERT INTO FrontDesk VALUES(41,'north tower');
INSERT INTO FrontDesk VALUES(21,'south tower');
INSERT INTO FrontDesk VALUES(31,'west tower');
INSERT INTO FrontDesk VALUES(11,'east tower');
INSERT INTO FrontDesk VALUES(51,'main tower');
INSERT INTO FrontDesk VALUES(52,'main tower');

CREATE TABLE customerCheckinOut( 
    customerID INTEGER PRIMARY KEY,
    deskNum INTEGER not null,
    dates CHAR(20),
    paymentType CHAR(20),
    customerName CHAR(100),
    FOREIGN KEY (deskNum) REFERENCES FrontDesk(deskNum)

);

INSERT INTO customerCheckinOut VALUES(0001,11,'Jul-02','master','Dennial');
INSERT INTO customerCheckinOut VALUES(0002,11,'Jan-02','paypal','Andy');
INSERT INTO customerCheckinOut VALUES(0003,11,'Feb-02','cash','Vince');
INSERT INTO customerCheckinOut VALUES(0004,11,'Nov-02','credit','Keiven');
INSERT INTO customerCheckinOut VALUES(0005,11,'Sep-02','cash','Sally');
INSERT INTO customerCheckinOut VALUES(11110001,11,'Aug-02','cash','Ben');
INSERT INTO customerCheckinOut VALUES(11110002,21,'July-03','visa','Lee');
INSERT INTO customerCheckinOut VALUES(11110003,31,'May-04','cash','Tom');
INSERT INTO customerCheckinOut VALUES(11110004,41,'Jan-05','visa','Lucy');
INSERT INTO customerCheckinOut VALUES(11110005,51,'Feb-07','e-transfer','John');


CREATE TABLE Salary(
	workExperience CHAR(30),
	Salary DOUBLE,
	PRIMARY KEY(workExperience)
);

INSERT INTO Salary VALUES('LESS THAN ONE YEAR', 3000);
INSERT INTO Salary VALUES('ONE TO THREE YEARS', 3500);
INSERT INTO Salary VALUES('THREE TO SEVEN YEARS', 4000);
INSERT INTO Salary VALUES('SEVEN TO TWELVE YEARS', 4300);
INSERT INTO Salary VALUES('MORE THAN TWELVE YEARS', 4500);


CREATE TABLE houseKeeper(
	sin char(20),
    name char(20),
    workExperience char(30),
    PRIMARY KEY (sin),
	FOREIGN KEY (workExperience) REFERENCES Salary(workExperience)
);

INSERT INTO houseKeeper VALUES('h001','Jamie','LESS THAN ONE YEAR');
INSERT INTO houseKeeper VALUES('h002','Bob','ONE TO THREE YEARS');
INSERT INTO houseKeeper VALUES('h003','JANE','THREE TO SEVEN YEARS');
INSERT INTO houseKeeper VALUES('h004','Lucy','SEVEN TO TWELVE YEARS');
INSERT INTO houseKeeper VALUES('h005','Chuck','MORE THAN TWELVE YEARS');

CREATE TABLE Supervisor(
    sin char(10) PRIMARY KEY,
    name CHAR(20)
);

INSERT INTO Supervisor VALUES('s001','Mike Lee');
INSERT INTO Supervisor VALUES('s002','Bob Michelinie');
INSERT INTO Supervisor VALUES('s003','Brian Michael');
INSERT INTO Supervisor VALUES('s004','Tom DeFalco');
INSERT INTO Supervisor VALUES('s005','Dave Richards');


Create table hotelRoom (
    roomNumber integer Primary key, 
    Floor integer,
    Size integer,
    Price integer
);

INSERT INTO hotelRoom VALUES(1209,12,30,90);
INSERT INTO hotelRoom VALUES(1302,13,30,90);
INSERT INTO hotelRoom VALUES(1508,15,30,90);
INSERT INTO hotelRoom VALUES(1609,16,30,90);
INSERT INTO hotelRoom VALUES(1706,17,30,90);

INSERT INTO hotelRoom VALUES(2503,17,45,150);
INSERT INTO hotelRoom VALUES(2504,18,45,150);
INSERT INTO hotelRoom VALUES(2505,19,45,150);
INSERT INTO hotelRoom VALUES(2506,25,70,200);
INSERT INTO hotelRoom VALUES(2515,38,90,300);

Create table standard_room
(roomNumber integer Primary key,
regularBreakfast char(20),
FOREIGN KEY (roomNumber) references hotelRoom(roomNumber) ON DELETE CASCADE ON UPDATE CASCADE);

INSERT INTO standard_room VALUES(1209,'regularCombo1');
INSERT INTO standard_room VALUES(1302,'regularCombo2');
INSERT INTO standard_room VALUES(1508,'regularCombo3');
INSERT INTO standard_room VALUES(1609,'regularCombo4');
INSERT INTO standard_room VALUES(1706,'regularCombo5');

CREATE TABLE deluxe_room
(roomNumber INTEGER Primary key,
Luxury_breakfast CHAR(20),
ClubAccess CHAR(20),
FOREIGN key (roomNumber) references hotelRoom(roomNumber) ON DELETE CASCADE ON UPDATE CASCADE);

INSERT INTO deluxe_room VALUES(2503,'Luxury Breakfast1','Combo1');
INSERT INTO deluxe_room VALUES(2504,'Luxury Breakfast2','Combo1');
INSERT INTO deluxe_room VALUES(2505,'Luxury Breakfast3','Combo2');
INSERT INTO deluxe_room VALUES(2506,'Luxury Breakfast4','Combo3');
INSERT INTO deluxe_room VALUES(2515,'Luxury Breakfast1','Combo4');

Create table kidsplayzone (
    name char(20) primary key, 
    Capacity integer
);

INSERT INTO kidsplayzone VALUES('Slide',10);
INSERT INTO kidsplayzone VALUES('Swimming pool',30);
INSERT INTO kidsplayzone VALUES('Swing',10);
INSERT INTO kidsplayzone VALUES('Seesaw',10);
INSERT INTO kidsplayzone VALUES('Sandlot',20);

Create table guardian (
    sin CHAR(10) primary key, 
    Name char(20)
);

INSERT INTO guardian VALUES('g001','John Coates');
INSERT INTO guardian VALUES('g002','Alex Smith');
INSERT INTO guardian VALUES('g003','Jack Jones');
INSERT INTO guardian VALUES('g004','Gias Evans');
INSERT INTO guardian VALUES('g005','Armani Davies');

Create table housekeeping
( sin char(20),
roomNumber integer,
Primary key (sin, roomNumber),
Foreign key (sin) references houseKeeper(sin) ON DELETE cascade, 
Foreign key (roomNumber) references hotelRoom(roomNumber) ON DELETE CASCADE
);

INSERT INTO housekeeping VALUES('h001',2503);
INSERT INTO housekeeping VALUES('h002',2504);
INSERT INTO housekeeping VALUES('h003',2506);
INSERT INTO housekeeping VALUES('h004',2505);
INSERT INTO housekeeping VALUES('h005',2515);

Create table supervised
(supervisorSIN char(10),
deskNumber integer,
Primary key (supervisorSIN, deskNumber), 
Foreign key (supervisorSIN) references Supervisor(sin), 
Foreign key (deskNumber) references FrontDesk (deskNum)
);

INSERT INTO supervised VALUES('s001',11);
INSERT INTO supervised VALUES('s002',21);
INSERT INTO supervised VALUES('s003',31);
INSERT INTO supervised VALUES('s004',41);
INSERT INTO supervised VALUES('s005',51);

CREATE TABLE KidsAllowance (
OpenHour CHAR(30) PRIMARY KEY, 
AllowKidsOrNot CHAR(1)
);

INSERT INTO KidsAllowance VALUES('24hour','N');
INSERT INTO KidsAllowance VALUES('10am-3pm','Y');
INSERT INTO KidsAllowance VALUES('8am-1pm','Y');
INSERT INTO KidsAllowance VALUES('2pm-7pm','Y');
INSERT INTO KidsAllowance VALUES('6pm-2am','N');

CREATE TABLE amenities(
Name CHAR(30) PRIMARY KEY,
Floor INTEGER NOT NULL unique,
Capacity INTEGER,
OpenHour char(30),
FOREIGN KEY (OpenHour) REFERENCES KidsAllowance (OpenHour)
);

INSERT INTO amenities VALUES('casino',7,150,'24hour');
INSERT INTO amenities VALUES('playground',2,100,'10am-3pm');
INSERT INTO amenities VALUES('FitnessRoom',3,100,'8am-1pm');
INSERT INTO amenities VALUES('pool',1,120,'2pm-7pm');
INSERT INTO amenities VALUES('club',6,120,'6pm-2am');

create Table phoneServe
(
deskNumber integer,
customerID integer,
serviceType char(20),
Primary key (deskNumber, customerID),
Foreign key (deskNumber) references FrontDesk(deskNum),
Foreign key (customerID) references customerCheckinOut(customerID)
ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO phoneServe VALUES(11,11110001,'morningCall');
INSERT INTO phoneServe VALUES(21,11110002,'cleaning');
INSERT INTO phoneServe VALUES(31,11110003,'breakfast');
INSERT INTO phoneServe VALUES(41,11110004,'morningCall');
INSERT INTO phoneServe VALUES(51,11110005,'cleaning');

Create table visit
(amenityName char(20),
customerID integer,
Time CHAR(20),
Primary key (amenityName, customerID),
Foreign key (amenityName) references amenities(Name),
Foreign key (customerID) references customerCheckinOut(customerID)
ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO visit VALUES('casino',11110001,'7pm Jun 17 2022');
INSERT INTO visit VALUES('club',11110001,'10pm Jun 17 2022');
INSERT INTO visit VALUES('FitnessRoom',11110001,'1pm Jun 17 2022');
INSERT INTO visit VALUES('pool',11110001,'3pm Jun 17 2022');
INSERT INTO visit VALUES('playground',11110001,'7pm Jun 17 2022');
INSERT INTO visit VALUES('FitnessRoom',11110002,'2pm May 2 2022');
INSERT INTO visit VALUES('club',11110003,'10am Feb 5 2021');
INSERT INTO visit VALUES('pool',11110005,'2pm July 29 2022');
INSERT INTO visit VALUES('club',11110005,'9pm Jan 3 2022');

CREATE TABLE TravelledWithKids( 
customerID INTEGER,
kidname CHAR(20),
Gender CHAR(10),
PRIMARY KEY(customerID, kidname),
FOREIGN KEY(customerID) REFERENCES customerCheckinOut(customerID)
ON UPDATE CASCADE ON DELETE CASCADE );

INSERT INTO TravelledWithKids VALUES(11110001,'Mike','male');
INSERT INTO TravelledWithKids VALUES(11110002,'Lily','female');
INSERT INTO TravelledWithKids VALUES(11110003,'Jack','male');
INSERT INTO TravelledWithKids VALUES(11110004,'Emily','female');
INSERT INTO TravelledWithKids VALUES(11110005,'Judy','male');

CREATE TABLE playAt_WithGuardian( 
customerID INTEGER,
kidname CHAR(20),
playzoneName CHAR(20),
guardianSIN CHAR(10) not NULL,
PRIMARY KEY(customerID, kidname, playzoneName),
FOREIGN KEY(customerID) REFERENCES TravelledWithKids(customerID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY(playzoneName) REFERENCES kidsplayzone(name),
FOREIGN KEY(guardianSIN) REFERENCES guardian(sin)
);

INSERT INTO playAt_WithGuardian VALUES(11110001,'Mike','Slide','g001');
INSERT INTO playAt_WithGuardian VALUES(11110002,'Lily','Swimming pool','g002');
INSERT INTO playAt_WithGuardian VALUES(11110003,'Jack','Swing','g003');
INSERT INTO playAt_WithGuardian VALUES(11110004,'Emily','Seesaw','g004');
INSERT INTO playAt_WithGuardian VALUES(11110005,'Judy','Sandlot','g005');


CREATE TABLE reserve( 
roomNumber INTEGER,
customerID INTEGER,
PRIMARY KEY(roomNumber, customerID),
FOREIGN KEY (roomNumber) REFERENCES hotelRoom(roomNumber), 
FOREIGN KEY (customerID) REFERENCES customerCheckinOut (customerID)
ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO reserve VALUES(2503,11110001);
INSERT INTO reserve VALUES(2504,11110002);
INSERT INTO reserve VALUES(2505,11110003);
INSERT INTO reserve VALUES(2506,11110004);
INSERT INTO reserve VALUES(2515,11110005);



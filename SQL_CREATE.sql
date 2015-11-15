CREATE TABLE userAccount(
	UserID INT,
	Matriculation_No VARCHAR(9),
	UserPassword VARCHAR(50),
	Name VARCHAR(50),
	Email VARCHAR(100),
	Contact INT,
	PRIMARY KEY (UserID)
)

CREATE TABLE bookingStatus(
	StatusCode VARCHAR(10),
	StatusName VARCHAR(50),
	PRIMARY KEY (StatusCode)
)

CREATE TABLE facilityType(
	TypeID INT,
	Type VARCHAR(50),
	PRIMARY KEY (TypeID)
)

CREATE TABLE building(
	BuildingID INT,
	Building_Name VARCHAR(50),
	BuildingAbbr VARCHAR(50),
	PRIMARY KEY (BuildingID)
)

CREATE TABLE facility(
	FacilityID INT,
	FacilityName VARCHAR(50),
	FacilityDescription VARCHAR(255),
	FacilityLevel VARCHAR(50),
	OperatingHour VARCHAR(50),
	TypeID INT,
	BuildingID INT,
	PRIMARY KEY (FacilityID),
	FOREIGN KEY (TypeID) REFERENCES facilityType ON DELETE NO ACTION,
	FOREIGN KEY (BuildingID) REFERENCES building ON DELETE CASCADE
)

CREATE TABLE booking(
	BookingID INT,
	BookingDate DATE,
	StartTime TIME,
	EndTime TIME,
	FacilityID INT,
	UserID INT,
	StatusCode VARCHAR(10),
	PRIMARY KEY (BookingID),
	FOREIGN KEY (FacilityID) REFERENCES facility,
	FOREIGN KEY (UserID) REFERENCES userAccount,
	FOREIGN KEY (StatusCode) REFERENCES bookingStatus
)
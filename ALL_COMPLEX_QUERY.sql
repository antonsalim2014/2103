SELECT b.BuildingAbbr, f.FacilityName, ft.Type, bk.BookingDate, bk.BookingTime, bs.StatusName
FROM Booking bk
INNER JOIN Facility f ON f.FacilityID = bk.FacilityID
INNER JOIN facilityType ft ON ft.TypeID= f.TypeID
INNER JOIN building b ON b.BuildingID = f.BuildingID
INNER JOIN bookingStatus bs ON bs.StatusCode = bk.StatusCode
WHERE userID = <userID> AND <other optional condition>

other optional condition
------------------------
o	booking.FacilityID = selected facility
o	facility.TypeID = selected facility type
o	booking.BookingDate BETWEEN start date and end date (a range of date)
o	booking.statusCode = selected booking status

SELECT Time_Range
FROM timing
WHERE Time_Range NOT IN (SELECT BookingTime
			FROM booking WHERE BookingDate = <bookingDate>
					AND FacilityID = <facilityID>
					AND StatusCode IN ('AC', 'OG'))

CREATE VIEW FACILITY_INFO AS
SELECT f.FacilityName AS FacilityName, f.OperatingHour AS OperationHour, ft.Type AS FacilityType, b.Building_Name AS BuildingName, b.BuildingAbbr AS BuildingAbbr, f.ImageLocation AS ImageLocation
FROM facility f, facilityType ft, building b
WHERE f.typeid = ft.typeid AND f.buildingid = b.buildingid;
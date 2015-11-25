CREATE VIEW FACILITY_INFO AS
SELECT f.FacilityName AS FacilityName, f.OperatingHour AS OperationHour, ft.Type AS FacilityType, b.Building_Name AS BuildingName, b.BuildingAbbr AS BuildingAbbr, f.ImageLocation AS ImageLocation
FROM facility f, facilityType ft, building b
WHERE f.typeid = ft.typeid AND f.buildingid = b.buildingid;
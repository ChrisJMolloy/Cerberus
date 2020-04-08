CREATE TABLE organization
(
    organization_id int NOT NULL,
    organization_name varchar(191),
    organization_street varchar(191),
    organization_city varchar(191),
    organization_province varchar(191),
    organization_postal_code varchar(191),
    organization_phone BIGINT(11),
    PRIMARY KEY (organization_id)


);

CREATE TABLE employee
(
    employee_id int NOT NULL,
    organization_id int NOT NULL,
    employee_fname varchar(191),
    employee_lname varchar(191),
    employee_phone BIGINT(11),
    employe_addr varchar(191),
    PRIMARY KEY (employee_id),
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id) ON DELETE cascade
);

CREATE TABLE spca
(
    organization_id int NOT NULL,
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id) ON DELETE CASCADE

);

CREATE TABLE rescue
(
    organization_id int NOT NULL,
    owner_id int,
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id)  ON DELETE CASCADE,
    FOREIGN KEY (owner_id) REFERENCES employee(employee_id) ON DELETE SET NULL

);

CREATE TABLE shelter
(
    organization_id int NOT NULL,
    owner_id int,
    website varchar(191),
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id)  ON DELETE CASCADE,
    FOREIGN KEY (owner_id) REFERENCES employee(employee_id) ON DELETE SET NULL

);

CREATE TABLE donation
(
    donator_id int NOT NULL,
    organization_id int NOT NULL,
    donation_date DATE NOT NULL,
    donation_amount FLOAT(2),
    donation_fname varchar(191),
    donation_lname varchar(191),
    PRIMARY KEY (donator_id,donation_date),
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id) ON DELETE cascade

);

CREATE TABLE animal
(
    animal_id int NOT NULL,
    species varchar(191),
    PRIMARY KEY (animal_id)
);

CREATE TABLE vet
(
    vet_id int NOT NULL,
    name varchar(191),
    PRIMARY KEY (vet_id)
);

CREATE TABLE vet_visit
(
    vet_visit_id int NOT NULL,
    animal_id int NOT NULL,
    vet_id int NOT NULL,
    animal_condition varchar(191),
    animal_weight_lbs FLOAT(2),
    checkup_date DATE,
    PRIMARY KEY (vet_visit_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (vet_id) REFERENCES vet(vet_id) ON DELETE CASCADE
);

CREATE TABLE family
(
    family_id int NOT NULL,
    family_lname varchar(191),
    family_street varchar(191),
    family_city varchar(191),
    family_province varchar(191),
    family_postal_code varchar(191),
    PRIMARY KEY (family_id)
);

CREATE TABLE adoption
(
    adoption_id int NOT NULL,
    family_id int NOT NULL,
    animal_id int NOT NULL,
    PRIMARY KEY (adoption_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (family_id) REFERENCES family(family_id) ON DELETE CASCADE
);

CREATE TABLE visit
(
    visit_id int NOT NULL,
    organization_id int NOT NULL,
    animal_id int NOT NULL,
    amount_paid FLOAT(2),
    PRIMARY KEY (visit_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (organization_id) REFERENCES organization(organization_id) ON DELETE CASCADE
);

CREATE TABLE animal_types
(
    species varchar(191) NOT NULL,
    organization_id int NOT NULL,
    capacity int
    unsigned NOT NULL,
    PRIMARY KEY
    (species),
    FOREIGN KEY
    (organization_id) REFERENCES shelter
    (organization_id) ON
    DELETE CASCADE
);

CREATE TABLE driver
(
	driver_id int NOT NULL,
	organization_id int,
	driver_fname varchar(191) NOT NULL,
	driver_lname varchar(191) NOT NULL,
	driver_phone BIGINT(11),
	driver_license_plate varchar(191) UNIQUE,
	driver_license_number int
	unsigned UNIQUE,
    PRIMARY KEY
	(driver_id),
    FOREIGN KEY
	(organization_id) REFERENCES rescue
	(organization_id) ON
	DELETE
	SET NULL
);

CREATE TABLE animal_transfer
(
	animal_transfer_id int NOT NULL,
	driver_id int,
	animal_id int NOT NULL,
	transfer_date DATE NOT NULL,
	PRIMARY KEY (animal_transfer_id),
	FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
	FOREIGN KEY (driver_id) REFERENCES driver (driver_id) ON DELETE SET NULL
);

#SETUP ORGS
INSERT INTO `organization` (`organization_id`, `organization_name`, `organization_street`, `organization_city`, `organization_province`, `organization_postal_code`, `organization_phone`) VALUES ('0', 'Bobs Shelter', '59 Sample Street', 'Kingston', 'Ontario', 'A1A2B2', '6131234567'), ('1', 'Other Shelter', '87 Other Street', 'City Name', 'Alberta', 'H5J4P5', '8694796789');
INSERT INTO `employee` (`employee_id`, `organization_id`, `employee_fname`, `employee_lname`, `employee_phone`, `employe_addr`) VALUES ('0', '0', 'Bob', 'Lname', '4567890123', '77 Street'), ('1', '1', 'Other', 'Name', '6667778888', 'Adress');
INSERT INTO `shelter` (`organization_id`, `owner_id`, `website`) VALUES ('0', '0', 'www.bob.com'), ('1', '1', 'www.othershelter.com');

INSERT INTO `organization` (`organization_id`, `organization_name`, `organization_street`, `organization_city`, `organization_province`, `organization_postal_code`, `organization_phone`) VALUES ('2', 'Rescue Org 1', '2 Rescue1 Street', 'A City', 'Ontario', 'P5P4N4', '6131234567'), ('3', 'Rescue Org 2', '8 Pine Street', 'Montreal', 'Quebec', 'y0y7p7', '8694796789');
INSERT INTO `employee` (`employee_id`, `organization_id`, `employee_fname`, `employee_lname`, `employee_phone`, `employe_addr`) VALUES ('2', '2', 'Annie', 'LName', '1112223333', '87 Address St.'), ('3', '3', 'Dan', 'TheMan', '5556664444', '66 Dan St.');
INSERT INTO `rescue` (`organization_id`, `owner_id`) VALUES ('2', '2'), ('3', '3');

INSERT INTO `organization` (`organization_id`, `organization_name`, `organization_street`, `organization_city`, `organization_province`, `organization_postal_code`, `organization_phone`) VALUES ('4', 'SPCA Shelter 1', '77 Long St', 'Fake', 'Nunavut', 'p8p9p9', '6667770000'), ('5', 'SPCA Shelter 2', '77 JFK Blvd.', 'Hill Valley', 'California', '90210', '6667778888');
INSERT INTO `spca` (`organization_id`) VALUES ('4'), ('5');

#SETUP ANIMALS
INSERT INTO `animal` (`animal_id`, `species`) VALUES ('0', 'dog'), ('1', 'dog'), ('2', 'cat'), ('3', 'cat'), ('4', 'rat'), ('5', 'rat'), ('6', 'cat');
INSERT INTO `driver` (`driver_id`, `organization_id`, `driver_fname`, `driver_lname`, `driver_phone`, `driver_license_plate`, `driver_license_number`) VALUES ('0', '2', 'Driver', 'Fast', '4444668888', 'FAST BOY', '45678'), ('1', '3', 'Driver', 'Slow', '0004446666', 'SLOW BOY', '43567');
INSERT INTO `vet` (`vet_id`, `name`) VALUES ('0', 'Animal Fixers'), ('1', 'Jen\'s Veternary Shop');
INSERT INTO `vet_visit` (`vet_visit_id`, `animal_id`, `vet_id`, `animal_condition`, `animal_weight_lbs`, `checkup_date`) VALUES ('0', '2', '0', 'pretty bad', '6', '2020-03-10'), ('1', '6', '0', 'pretty good', '7', '2020-01-08'), ('2', '4', '1', 'new', '1', '2020-03-18');
INSERT INTO `visit` (`visit_id`, `organization_id`, `animal_id`, `amount_paid`) VALUES ('0', '2', '6', '77'), ('1', '4', '0', '6'), ('2', '0', '0', '5');
INSERT INTO `family` (`family_id`, `family_lname`, `family_street`, `family_city`, `family_province`, `family_postal_code`) VALUES ('0', 'Wright', '67 Place', 'New York', 'New York', '90210'), ('1', 'North', 'Cold Street', 'Iqaluit', 'Nunavut', 'p6p7n7');
INSERT INTO `adoption` (`adoption_id`, `family_id`, `animal_id`) VALUES ('0', '1', '2'), ('1', '0', '5');
INSERT INTO `donation` (`donator_id`, `organization_id`, `donation_date`, `donation_amount`, `donation_fname`, `donation_lname`) VALUES ('0', '2', '2020-04-05', '99999', 'Jenny', 'Money'), ('1', '1', '2020-03-05', '77', 'Frank', 'Average');
INSERT INTO `animal_transfer` (`animal_transfer_id`, `driver_id`, `animal_id`, `transfer_date`) VALUES ('0', '0', '0', '2020-02-12'), ('1', '0', '6', '2020-02-19'), ('2', '1', '5', '2019-11-06');
INSERT INTO `animal_types` (`species`, `organization_id`, `capacity`) VALUES ('rat', '0', '5'), ('cat', '0', '7'), ('dog', '1', '2'), ('rabbit', '1', '9');

#2018 Donations
INSERT INTO `donation` (`donator_id`, `organization_id`, `donation_date`, `donation_amount`, `donation_fname`, `donation_lname`) VALUES ('2', '1', '2018-10-09', '77', 'Nancy', 'Ycnan'),('2', '1', '2018-09-09', '14', 'Nancy', 'Ycnan'), ('3', '1', '2018-09-11', '33', 'Maggie', 'Eiggam'), ('4', '3', '2018-06-05', '50080', 'Curious', 'George');
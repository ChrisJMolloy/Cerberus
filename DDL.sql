CREATE TABLE organisation(
    organization_id int NOT NULL,
    organization_name varchar(255),
    org_street varchar(255),
    org_city varchar(255),
    org_province varchar(255),
    org_postal_code varchar(255),
    org_phone BIGINT(11),
    PRIMARY KEY (organization_id)
 
   
);

CREATE TABLE employee(
    employee_id int NOT NULL,
    organization_id int NOT NULL,
    employee_fname varchar(255),
    employee_lname varchar(255),
    employee_phone BIGINT(11),
    employe_addr varchar(255),
    PRIMARY KEY (employee_id),
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id) ON DELETE cascade
);

CREATE TABLE spca(
    organization_id int NOT NULL,
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id) ON DELETE CASCADE

);

CREATE TABLE rescue(
    organization_id int NOT NULL,
    owner_id int,
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id)  ON DELETE CASCADE,
    FOREIGN KEY (owner_id) REFERENCES employee(employee_id) ON DELETE SET NULL

);

CREATE TABLE shelter(
    organization_id int NOT NULL,
    owner_id int,
    website varchar(255),
    PRIMARY KEY (organization_id),
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id)  ON DELETE CASCADE,
    FOREIGN KEY (owner_id) REFERENCES employee(employee_id) ON DELETE SET NULL

);

CREATE TABLE donation(
    donator_id int NOT NULL,
    organization_id int NOT NULL,
    donation_date DATE NOT NULL,
    donation_amount FLOAT(2),
    PRIMARY KEY (donator_id,donation_date),
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id) ON DELETE cascade

);

CREATE TABLE animal(
    animal_id int NOT NULL,
    species varchar(255),
    PRIMARY KEY (animal_id)
);

CREATE TABLE vet(
    vet_id int NOT NULL,
    name varchar(255),
    PRIMARY KEY (vet_id)
);

CREATE TABLE vet_visit(
    vet_visit_id int NOT NULL,
    animal_id int NOT NULL,
    vet_id int NOT NULL,
    animal_condition varchar(255),
    animal_weight_lbs FLOAT(2),
    checkup_date DATE,
    PRIMARY KEY (vet_visit_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (vet_id) REFERENCES vet(vet_id) ON DELETE CASCADE
);

CREATE TABLE family(
    family_id int NOT NULL,
    family_lname varchar(255),
    family_street varchar(255),
    family_city varchar(255),
    family_province varchar(255),
    family_postal_code varchar(255),
    PRIMARY KEY (family_id)
);

CREATE TABLE adoption(
    adoption_id int NOT NULL,
    family_id int NOT NULL,
    animal_id int NOT NULL,
    PRIMARY KEY (adoption_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (family_id) REFERENCES family(family_id) ON DELETE CASCADE
);

CREATE TABLE visit(
    visit_id int NOT NULL,
    organization_id int NOT NULL,
    animal_id int NOT NULL,
    amount_paid FLOAT(2),
    PRIMARY KEY (visit_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (organization_id) REFERENCES organisation(organization_id) ON DELETE CASCADE
);

CREATE TABLE animal_types(
    species varchar(255) NOT NULL,
    organization_id int NOT NULL,
    capacity int unsigned NOT NULL,
    PRIMARY KEY (species),
    FOREIGN KEY (organization_id) REFERENCES shelter (organization_id) ON DELETE CASCADE
);

CREATE TABLE driver(
    driver_id int NOT NULL,
    organization_id int,
    driver_fname varchar(255) NOT NULL,
    driver_lname varchar(255) NOT NULL,
    driver_phone BIGINT(11),
    driver_lisence_plate varchar(255) UNIQUE,
    driver_lisence_number int unsigned UNIQUE,
    PRIMARY KEY (driver_id),
    FOREIGN KEY (organization_id) REFERENCES rescue (organization_id) ON DELETE SET NULL
);

CREATE TABLE animal_transfer(
    animal_transfer_id int NOT NULL,
    driver_id int,
    animal_id int NOT NULL,
    PRIMARY KEY (animal_transfer_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (driver_id) REFERENCES driver (driver_id) ON DELETE SET NULL
);
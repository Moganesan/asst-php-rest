USE asset_management_system;

CREATE TABLE organizations(ID INT NOT NULL AUTO_INCREMENT,name VARCHAR(32),address TEXT,website VARCHAR(32),email VARCHAR(32),mobile INT(12),logo TEXT,PRIMARY KEY (ID));

CREATE TABLE branchs(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_name VARCHAR(32),address text(200),website VARCHAR(32),email varchar(32),mobile INT(12),PRIMARY KEY (ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID));

CREATE TABLE buildings(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,building_name VARCHAR(32),PRIMARY KEY (ID), FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branchs(ID));

CREATE TABLE floors(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,building_id INT,floor_name VARCHAR(32),PRIMARY KEY (ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branches(ID),FOREIGN KEY (building_id) REFERENCES buildings(ID));

CREATE TABLE rooms(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,building_id INT,floor_id INT,room_name VARCHAR(32),PRIMARY KEY (ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id)REFERENCES branches(ID),FOREIGN KEY (building_id) REFERENCES buildings(ID), FOREIGN KEY (floor_id) REFERENCES floors(ID));

CREATE TABLE departments(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,category_id INT,department_name VARCHAR(32),PRIMARY KEY (ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branches(ID));

CREATE TABLE categories(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,category_name VARCHAR(32),PRIMARY KEY(ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branches(ID));

CREATE TABLE sub_categories(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,category_id INT,sub_category_name VARCHAR(32),PRIMARY KEY(ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branches(ID),FOREIGN KEY (category_id) REFERENCES categories(ID));

CREATE TABLE roles(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,department_id INT,role VARCHAR(32),PRIMARY KEY (ID),FOREIGN KEY (branch_id) REFERENCES branches(ID),FOREIGN KEY (department_id) REFERENCES departments(ID));

CREATE TABLE cluster(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,branch_id INT,building_id INT,floor_id INT,cluster_name VARCHAR(32),PRIMARY KEY (ID),FOREIGN KEY (organization_id) REFERENCES organizations(ID),FOREIGN KEY (branch_id) REFERENCES branches(ID),FOREIGN KEY (building_id) REFERENCES buildings(ID),FOREIGN KEY (floor_id) REFERENCES floors(ID));

-- CREATE TABLE assets(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,building_id INT,branch_id INT,floor_id INT,category_id INT,sub_category_id INT,asset_tag_id INT,serial VARCHAR(32),modal_id INT, status VARCHAR(32),asset_name VARCHAR(32),supplier_id INT,order_no VARCHAR(32),purchase_cost INT,warranty_months INT,image TEXT,working_condition VARCHAR(32),amc_details BOOLEAN,amc_done_date DATE,amc_amount INT,amc_document TEXT,amc_done_date DATE,invoice_details BOOLEAN,invoice_no VARCHAR(32),invoice_image TEXT,
-- PRIMARY KEY (ID),
-- FOREIGN KEY (organization_id) REFERENCES organizations(ID),
-- FOREIGN KEY (building_id) REFERENCES buildings(ID),
-- FOREIGN KEY (branch_id) REFERENCES branches(ID),
-- FOREIGN KEY (floor_id) REFERENCES floors(ID),
-- FOREIGN KEY (category_id) REFERENCES categories(ID),
-- FOREIGN KEY (sub_category_id) REFERENCES sub_categories(ID),
-- FOREIGN KEY (asset_tag_id) REFERENCES asset_tags(ID),
-- FOREIGN KEY (modal_id) REFERENCES asset_modals(ID),
-- FOREIGN KEY (supplier_id) REFERENCES suppliers(ID),
-- )
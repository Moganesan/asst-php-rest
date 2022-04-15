USE asset_management_system;

CREATE TABLE sample(sample VARCHAR(32)); 

CREATE TABLE assets(ID INT NOT NULL AUTO_INCREMENT,organization_id INT,building_id INT,branch_id INT,floor_id INT,category_id INT,sub_category_id INT,asset_tag_id INT,serial VARCHAR(32),modal_id INT, status VARCHAR(32),asset_name VARCHAR(32),supplier_id INT,order_no VARCHAR(32),purchase_cost INT,warranty_months INT,image TEXT,working_condition VARCHAR(32),amc_details BOOLEAN,amc_done_date DATE,amc_amount INT,amc_document TEXT,amc_done_date DATE,invoice_details BOOLEAN,invoice_no VARCHAR(32),invoice_image TEXT,
PRIMARY KEY (ID),
FOREIGN KEY (organization_id) REFERENCES organizations(ID),
FOREIGN KEY (building_id) REFERENCES buildings(ID),
FOREIGN KEY (branch_id) REFERENCES branches(ID),
FOREIGN KEY (floor_id) REFERENCES floors(ID),
FOREIGN KEY (category_id) REFERENCES categories(ID),
FOREIGN KEY (sub_category_id) REFERENCES sub_categories(ID),
FOREIGN KEY (asset_tag_id) REFERENCES asset_tags(ID),
FOREIGN KEY (modal_id) REFERENCES asset_modals(ID),
FOREIGN KEY (supplier_id) REFERENCES suppliers(ID),
)
-- Products Table
CREATE TABLE Products (
    ProductID INT PRIMARY KEY AUTO_INCREMENT,
    ProductName VARCHAR(100),
    Description VARCHAR(255),
    Category VARCHAR(50),
    DeliveryRequired VARCHAR(3),
    Price DECIMAL(10, 2),
    Stocks INT,
    UnitOfMeasurement VARCHAR(20),
    TaxRate DECIMAL(5, 2)
);


-- Customers Table
CREATE TABLE IF NOT EXISTS Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

-- Employees Table
CREATE TABLE IF NOT EXISTS Employees (
    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Position VARCHAR(100),
    Email VARCHAR(100),
    Phone VARCHAR(20)
);

-- Sales Table with DeliveryDate column
CREATE TABLE IF NOT EXISTS Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    SaleDate DATETIME,
    SalePreference ENUM('Delivery', 'Pick-up'),
    PaymentMode ENUM('Cash', 'Card'),
    CardNumber VARCHAR(16),
    ExpiryDate TEXT,
    CVV VARCHAR(3),
    TotalAmount DECIMAL(10, 2),
    EmployeeID INT,
    CustomerID INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- SaleDetails Table
CREATE TABLE IF NOT EXISTS SaleDetails (
    SaleDetailID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,
    ProductID INT,
    Quantity INT,
    UnitPrice DECIMAL(10, 2),
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- DeliveryOrders Table
CREATE TABLE IF NOT EXISTS DeliveryOrders (
    DeliveryOrderID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,  
    ProductID INT,
    Quantity INT,
    DeliveryAddress TEXT,
    DeliveryDate DATE,
    ReceivedDate DATE,  
    DeliveryStatus ENUM('Pending', 'In Transit', 'Delivered') DEFAULT 'Pending',
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

INSERT INTO Products (ProductName, Description, Category, DeliveryRequired, Price, Stocks, TaxRate) 
VALUES 
    ('Hammer (Large)', 'Heavy-duty hammer for construction work', 'Tools', 'No', 299.00, 50, 0.12),
    ('Screwdriver Set (Standard)', 'Set of 6 screwdrivers with various sizes', 'Tools', 'No', 199.00, 30, 0.12),
    ('Cement (50kg)', 'Portland cement for construction purposes', 'Building Materials', 'Yes', 220.00, 100, 0.12),
    ('Gravel (1 ton)', 'Crushed stone for construction projects', 'Building Materials', 'Yes', 500.00, 50, 0.12),
    ('Paint Brush Set', 'Set of 10 paint brushes for art projects', 'Art Supplies', 'No', 99.00, 20, 0.12),
    ('Safety Helmet', 'Hard hat helmet for construction safety', 'Safety Gear', 'No', 150.00, 40, 0.12),
    ('Drill Machine', 'Cordless drill machine with rechargeable batteries', 'Tools', 'No', 599.00, 15, 0.12),
    ('Plywood (4x8 feet)', 'Plywood sheets for carpentry and construction', 'Building Materials', 'Yes', 600.00, 30, 0.12),
    ('Steel Bar (1 meter)', 'Deformed steel bars for reinforcement in concrete construction', 'Building Materials', 'Yes', 50.00, 200, 0.12),
    ('Paint Thinner', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'Paints and Chemicals', 'No', 150.00, 50, 0.12),
    ('Concrete Blocks (Standard)', 'Standard concrete blocks for building walls', 'Building Materials', 'Yes', 5.00, 200, 0.12),
    ('Roofing Shingles (Bundle)', 'Bundle of roofing shingles for covering roofs', 'Building Materials', 'Yes', 25.00, 100, 0.12),
    ('Sand (1 cubic yard)', 'Fine aggregate sand for various construction applications', 'Building Materials', 'Yes', 40.00, 150, 0.12),
    ('Brick (Standard)', 'Standard clay bricks for construction', 'Building Materials', 'Yes', 0.50, 500, 0.12),
    ('Wood Studs (8 feet)', 'Standard wood studs for framing walls', 'Building Materials', 'Yes', 3.00, 300, 0.12),
    ('Galvanized Nails (5 lbs)', 'Galvanized nails for various construction applications', 'Building Materials', 'Yes', 10.00, 100, 0.12),
    ('Drywall (4x8 feet)', 'Drywall sheets for interior wall finishing', 'Building Materials', 'Yes', 12.00, 200, 0.12),
    ('Concrete Mix (50 lb)', 'Pre-mixed concrete for small-scale construction projects', 'Building Materials', 'Yes', 8.00, 150, 0.12);

INSERT INTO Products (ProductName, Description, Category, DeliveryRequired, Price, Stocks, TaxRate, UnitOfMeasurement) 
VALUES 
    ('Hammer (Large)', 'Heavy-duty hammer for construction work', 'Tools', 'No', 299.00, 50, 0.12, 'pcs'),
    ('Screwdriver Set (Standard)', 'Set of 6 screwdrivers with various sizes', 'Tools', 'No', 199.00, 30, 0.12, 'set'),
    ('Cement (50kg)', 'Portland cement for construction purposes', 'Building Materials', 'Yes', 220.00, 100, 0.12, 'kg'),
    ('Gravel (1 ton)', 'Crushed stone for construction projects', 'Building Materials', 'Yes', 500.00, 50, 0.12, 'ton'),
    ('Paint Brush Set', 'Set of 10 paint brushes for art projects', 'Art Supplies', 'No', 99.00, 20, 0.12, 'set'),
    ('Safety Helmet', 'Hard hat helmet for construction safety', 'Safety Gear', 'No', 150.00, 40, 0.12, 'pcs'),
    ('Drill Machine', 'Cordless drill machine with rechargeable batteries', 'Tools', 'No', 599.00, 15, 0.12, 'pcs'),
    ('Plywood (4x8 feet)', 'Plywood sheets for carpentry and construction', 'Building Materials', 'Yes', 600.00, 30, 0.12, 'sheet'),
    ('Steel Bar (1 meter)', 'Deformed steel bars for reinforcement in concrete construction', 'Building Materials', 'Yes', 50.00, 200, 0.12, 'meter'),
    ('Paint Thinner', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'Paints and Chemicals', 'No', 150.00, 50, 0.12, NULL),
    ('Concrete Blocks (Standard)', 'Standard concrete blocks for building walls', 'Building Materials', 'Yes', 5.00, 200, 0.12, 'pcs'),
    ('Roofing Shingles (Bundle)', 'Bundle of roofing shingles for covering roofs', 'Building Materials', 'Yes', 25.00, 100, 0.12, 'bundle'),
    ('Sand (1 cubic yard)', 'Fine aggregate sand for various construction applications', 'Building Materials', 'Yes', 40.00, 150, 0.12, 'cubic yard'),
    ('Brick (Standard)', 'Standard clay bricks for construction', 'Building Materials', 'Yes', 0.50, 500, 0.12, 'pcs'),
    ('Wood Studs (8 feet)', 'Standard wood studs for framing walls', 'Building Materials', 'Yes', 3.00, 300, 0.12, '8 feet'),
    ('Galvanized Nails (5 lbs)', 'Galvanized nails for various construction applications', 'Building Materials', 'Yes', 10.00, 100, 0.12, 'lbs'),
    ('Drywall (4x8 feet)', 'Drywall sheets for interior wall finishing', 'Building Materials', 'Yes', 12.00, 200, 0.12, 'sheet'),
    ('Concrete Mix (50 lb)', 'Pre-mixed concrete for small-scale construction projects', 'Building Materials', 'Yes', 8.00, 150, 0.12, 'lb');

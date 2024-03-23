-- Products Table
CREATE TABLE IF NOT EXISTS Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255),
    Description TEXT,
    Category VARCHAR(100),
    DeliveryRequired ENUM('Yes', 'No') DEFAULT 'No',
    Price DECIMAL(10, 2),
    Quantity INT,
    TaxRate DECIMAL(5, 2) DEFAULT 0 
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
    SaleID INT,  -- Reference to the corresponding sales order
    ProductID INT,
    ProductWeight DECIMAL(10, 2),
    Quantity INT,
    DeliveryAddress TEXT,
    DeliveryDate DATE,
    ReceivedDate DATE,  -- New column for the date the delivery was received
    DeliveryStatus ENUM('Pending', 'In Transit', 'Delivered') DEFAULT 'Pending',
    TruckID INT,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (TruckID) REFERENCES Truck(TruckID)
);

-- Truck Table
CREATE TABLE IF NOT EXISTS Trucks (
    TruckID INT AUTO_INCREMENT PRIMARY KEY,
    PlateNumber TEXT,
    TruckStatus ENUM('Available', 'In Transit', 'Unavailable') DEFAULT 'Available',
    TruckType ENUM('Light-Duty', 'Heavy-Duty')
);
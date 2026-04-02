CREATE database task6;

USE task6;

-- Create Main Table
CREATE TABLE employees (
    emp_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    salary FLOAT,
    department VARCHAR(50)
);

-- Create Audit Log Table
CREATE TABLE employee_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    emp_id INT,
    action_type VARCHAR(20),   -- INSERT / UPDATE
    old_salary FLOAT,
    new_salary FLOAT,
    action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create INSERT Trigger
DELIMITER $$

CREATE TRIGGER after_employee_insert
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    INSERT INTO employee_log(emp_id, action_type, new_salary)
    VALUES (NEW.emp_id, 'INSERT', NEW.salary);
END $$

DELIMITER ;

-- Create UPDATE Trigger
DELIMITER $$

CREATE TRIGGER after_employee_update
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    INSERT INTO employee_log(emp_id, action_type, old_salary, new_salary)
    VALUES (OLD.emp_id, 'UPDATE', OLD.salary, NEW.salary);
END $$

DELIMITER ;

-- Test Your Triggers
INSERT INTO employees(name, salary, department)
VALUES ('Arif', 30000, 'CSE');

INSERT INTO employees(name, salary, department)
VALUES ('PANT', 30000, 'IT');

-- Update data:
UPDATE employees
SET salary = 35000
WHERE emp_id = 1;

UPDATE employees
SET salary = 40000
WHERE emp_id = 2;

-- Check logs:
SELECT * FROM employee_log;

-- Create Daily Activity View
CREATE VIEW daily_activity AS
SELECT 
    DATE(action_time) AS activity_date,
    action_type,
    COUNT(*) AS total_actions
FROM employee_log
GROUP BY DATE(action_time), action_type;

-- Use the View
SELECT * FROM daily_activity;
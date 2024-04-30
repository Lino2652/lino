CREATE TABLE participants (
  id SERIAL,
  full_name VARCHAR(255),
  phone_number VARCHAR(14),
  reg_no VARCHAR(11),
  level VARCHAR(3),
  email TEXT,
  created_at TIMESTAMP DEFAULT NOW()
);

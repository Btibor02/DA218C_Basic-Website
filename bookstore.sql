CREATE DATABASE bookstore;
USE bookstore;

CREATE TABLE books (
    id INT NOT NULL AUTO_INCREMENT,
    author VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    summary VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO books (author, title, category, summary, price) VALUES
('George Orwell', '1984', 'Dystopian', 'A totalitarian regime controls everything.', 150),
('J.K. Rowling', 'Harry Potter and the Sorcerer''s Stone', 'Fantasy', 'A young wizard discovers his magical heritage.', 200),
('J.R.R. Tolkien', 'The Hobbit', 'Fantasy', 'A hobbit embarks on an unexpected adventure.', 180),
('Harper Lee', 'To Kill a Mockingbird', 'Classic', 'A story of racial injustice in the Deep South.', 140),
('F. Scott Fitzgerald', 'The Great Gatsby', 'Classic', 'A mysterious millionaire hosts lavish parties.', 170),
('Mary Shelley', 'Frankenstein', 'Horror', 'A scientist creates a monstrous being.', 130),
('Jane Austen', 'Pride and Prejudice', 'Romance', 'A tale of love and societal expectations.', 160),
('Mark Twain', 'Adventures of Huckleberry Finn', 'Adventure', 'A boy journeys down the Mississippi River.', 150),
('Ernest Hemingway', 'The Old Man and the Sea', 'Fiction', 'An aging fisherman battles a giant marlin.', 120),
('Bram Stoker', 'Dracula', 'Horror', 'A vampire terrorizes Victorian England.', 190),
('Agatha Christie', 'Murder on the Orient Express', 'Mystery', 'A detective solves a murder on a train.', 220),
('H.G. Wells', 'The War of the Worlds', 'Science Fiction', 'Aliens invade Earth.', 180);
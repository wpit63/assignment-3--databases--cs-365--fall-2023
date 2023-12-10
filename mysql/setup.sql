DROP DATABASE IF EXISTS student_passwords;

CREATE DATABASE student_passwords;

DROP USER IF EXISTS 'passwords_user'@'localhost';

CREATE USER 'passwords_user'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL ON student_passwords.* TO 'passwords_user'@'localhost';

USE student_passwords;

CREATE TABLE website (
  web_domain  CHAR(255)     NOT NULL,
  web_name    CHAR(128)     NOT NULL,

  PRIMARY KEY (web_domain)
);

CREATE TABLE account (
  web_domain  CHAR(255)     NOT NULL,
  username    CHAR(64)      NOT NULL,
  email       CHAR(128)     NOT NULL,
  p_word      CHAR(64)      NOT NULL,
  comment     TEXT(65535)           ,

  PRIMARY KEY (web_domain, p_word)
);

INSERT INTO website VALUES ('https://www.youtube.com', 'YouTube');
INSERT INTO website VALUES ('https://www.twitter.com', 'Twitter');
INSERT INTO website VALUES ('https://github.com', 'GitHub');
INSERT INTO website VALUES ('https://www.linkedin.com', 'LinkedIn');
INSERT INTO website VALUES ('https://www.microsoft.com', 'Microsoft');
-- INSERT INTO website VALUES ('https://www.apple.com', 'Apple');
-- INSERT INTO website VALUES ('https://www.mozilla.org', 'Mozilla');
-- INSERT INTO website VALUES ('https://www.blogger.com', 'Blogger');
-- INSERT INTO website VALUES ('https://arca.live', 'Arcalive');
-- INSERT INTO website VALUES ('https://www.reddit.com', 'Reddit');

INSERT INTO account VALUES ('https://www.youtube.com', 'Billy Channel', 'billy@gmail.com', 'bobrules!', "My channel");
INSERT INTO account VALUES ('https://www.twitter.com', 'vmays90', 'victormays@gmail.com', 'stay_OUT', "i mean it");
INSERT INTO account VALUES ('https://github.com', 'empress5', 'empress5@hotmail.com', 'relaire', "blah blah");
INSERT INTO account VALUES ('https://www.linkedin.com', 'Mari_G', 'mari@outlook.com', 'sunny', "this is a comment");
INSERT INTO account VALUES ('https://www.microsoft.com', 'starlight_actress', 'kaijou@outlook.com', 'mr_white', "star");
-- INSERT INTO account VALUES ('https://www.apple.com', 'acedetective', 'watson@gmail.com', 'mythw4tch', "gen 1");
-- INSERT INTO account VALUES ('https://www.mozilla.org', 'plsnoscam', 'catsaysmeow@hotmail.com', 'mastershiba', "no more ramen");
-- INSERT INTO account VALUES ('https://www.blogger.com', 'rocketman', 'rocketman@gmail.com', 'glowing1', "don't say anything");
-- INSERT INTO account VALUES ('https://arca.live', 'khajituser', 'jdoe@gmail.com', 'letmein', "comment");
-- INSERT INTO account VALUES ('https://www.reddit.com', 'redditor', 'jmann@outlook.com', 'idiottalk', "comment 2");

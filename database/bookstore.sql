-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- 생성 시간: 22-01-12 00:36
-- 서버 버전: 5.7.31
-- PHP 버전: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `bookstore`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(50) NOT NULL,
  `title` text,
  `price` float DEFAULT '0',
  `author` text,
  `bookimage` text,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `publisher` text,
  `page` int(11) DEFAULT '0',
  `language` text,
  `published_date` date DEFAULT NULL,
  `genre` text,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `book`
--

INSERT INTO `book` (`bookid`, `isbn`, `title`, `price`, `author`, `bookimage`, `description`, `publisher`, `page`, `language`, `published_date`, `genre`) VALUES
(1, '735211299', 'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones', 13.99, 'James Clear', 'WeChat Image_20220110183207.jpg', 'The #1 New York Times bestseller. Over 3 million copies sold!\r\n\r\nTiny Changes, Remarkable Results\r\n\r\nNo matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear, one of the world\'s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.\r\n\r\nIf you\'re having trouble changing your habits, the problem isn\'t you. The problem is your system. Bad habits repeat themselves again and again not because you don\'t want to change, but because you have the wrong system for change. You do not rise to the level of your goals. You fall to the level of your systems. Here, you\'ll get a proven system that can take you to new heights.\r\n\r\nClear is known for his ability to distill complex topics into simple behaviors that can be easily applied to daily life and work. Here, he draws on the most proven ideas from biology, psychology, and neuroscience to create an easy-to-understand guide for making good habits inevitable and bad habits impossible. Along the way, readers will be inspired and entertained with true stories from Olympic gold medalists, award-winning artists, business leaders, life-saving physicians, and star comedians who have used the science of small habits to master their craft and vault to the top of their field.\r\n\r\nLearn how to:\r\n  â€¢  make time for new habits (even when life gets crazy);\r\n  â€¢  overcome a lack of motivation and willpower;\r\n  â€¢  design your environment to make success easier;\r\n  â€¢  get back on track when you fall off course;\r\n...and much more.\r\n\r\nAtomic Habits will reshape the way you think about progress and success, and give you the tools and strategies you need to transform your habits--whether you are a team looking to win a championship, an organization hoping to redefine an industry, or simply an individual who wishes to quit smoking, lose weight, reduce stress, or achieve any other goal.', 'Avery', 320, 'Engslish', '2018-10-16', 'Self-Help'),
(2, 'B09KN7Y179', 'A Not So Meet Cute Kindle Edition', 15.99, 'Meghan Quinn', 'WeChat Image_20220110183145.jpg', '\"Don\'t let that cute cover fool you- this is SMOKIN\' HOT, with sexual tension dripping from every page. I was HOOKED from the start, and I devoured it at an alarming rate, even for on eof Quinn\'s rom cons. And this IS a rom com, albeit a very tense and steamy one.\" - Jeeves Reads Romance', 'Hot-Lanta Publishing LLC', 404, 'Engslish', '2021-11-02', 'romantic comedy'),
(3, '399592555', 'Atlas of the Heart: Mapping Meaningful Connection and the Language of Human Experience Hardcover', 18.34, 'BrenÃ© Brown', 'WeChat Image_20220110183212.jpg', ' In Atlas of the Heart BrenÃ© Brown unpacks the complex web of emotion, behavior, and thoughts that are triggered by our experiences, and gives us the nuanced language to fully understand our feelings and express them to others. At first glance, this seems like a very thorny subject, but Brown engages the reader through anecdotes, humor, and data to create a narrative that makes total sense. The bookâ€™s map metaphor and chapter titles guide readers through the places we go when we are experiencing different emotions, illustrating how a seemingly singular emotion or experienceâ€”regret, for exampleâ€”has multiple categorizations (six in this case), each of which feels distinct from the others. As I read Atlas of the Heart I had the overwhelming sense that Brown â€œgotâ€ me so clearly it gave me the chills, and I think others will also feel seen, understood, and changed for the better by what this book has to offer. â€”Seira Wilson, Amazon Editor', 'Random House; First Edition', 336, 'Engslish', '2021-10-30', 'Health, Fitness & Dieting'),
(4, '140280197', 'The 48 Laws of Power', 16.99, 'Robert Greene', 'WeChat Image_20220110183215.jpg', 'Amoral, cunning, ruthless, and instructive, this multi-million-copy New York Times bestseller is the definitive manual for anyone interested in gaining, observing, or defending against ultimate control â€“ from the author of The Laws of Human Nature.\r\n\r\nIn the book that People magazine proclaimed â€œbeguilingâ€ and â€œfascinating,â€ Robert Greene and Joost Elffers have distilled three thousand years of the history of power into 48 essential laws by drawing from the philosophies of Machiavelli, Sun Tzu, and Carl Von Clausewitz and also from the lives of figures ranging from Henry Kissinger to P.T. Barnum.\r\n \r\nSome laws teach the need for prudence (â€œLaw 1: Never Outshine the Masterâ€), others teach the value of confidence (â€œLaw 28: Enter Action with Boldnessâ€), and many recommend absolute self-preservation (â€œLaw 15: Crush Your Enemy Totallyâ€). Every law, though, has one thing in common: an interest in total domination. In a bold and arresting two-color package, The 48 Laws of Power is ideal whether your aim is conquest, self-defense, or simply to understand the rules of the game.', 'Penguin Books', 452, 'Engslish', '2000-09-01', 'Politics & Social Sciences'),
(5, '812985818', 'Braving the Wilderness: The Quest for True Belonging and the Courage to Stand Alone', 6.84, 'BrenÃ© Brown', 'í™”ë©´ ìº¡ì²˜ 2022-01-12 015226.png', 'â€œ[Brownâ€™s] research and work have given us a new vocabulary, a way to talk with each other about the ideas and feelings and fears weâ€™ve all had but havenâ€™t quite known how to articulate. . . . [She] empowers us each to be a little more courageous.â€â€”The Huffington Post', 'Random House Trade Paperbacks; Reprint edition', 208, 'Engslish', '2019-08-27', 'Self-Help'),
(6, '62457713', 'The Subtle Art of Not Giving a F*ck: A Counterintuitive Approach to Living a Good Life', 10.92, 'Mark Mansion', 'WeChat Image_20220110183218.jpg', '#1 New York Times Bestseller\r\n\r\nOver 10 million copies sold\r\n\r\nIn this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be \"positive\" all the time so that we can truly become better, happier people.\r\n\r\nFor decades, weâ€™ve been told that positive thinking is the key to a happy, rich life. \"F**k positivity,\" Mark Manson says. \"Letâ€™s be honest, shit is f**ked and we have to live with it.\" In his wildly popular Internet blog, Manson doesnâ€™t sugarcoat or equivocate. He tells it like it isâ€”a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, letâ€™s-all-feel-good mindset that has infected modern society and spoiled a generation, rewarding them with gold medals just for showing up.\r\n\r\nManson makes the argument, backed both by academic research and well-timed poop jokes, that improving our lives hinges not on our ability to turn lemons into lemonade, but on learning to stomach lemons better. Human beings are flawed and limitedâ€”\"not everybody can be extraordinary, there are winners and losers in society, and some of it is not fair or your fault.\" Manson advises us to get to know our limitations and accept them. Once we embrace our fears, faults, and uncertainties, once we stop running and avoiding and start confronting painful truths, we can begin to find the courage, perseverance, honesty, responsibility, curiosity, and forgiveness we seek.\r\n\r\nThere are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F**k is a refreshing slap for a generation to help them lead contented, grounded lives.', 'Harper', 224, 'Engslish', '2016-09-13', 'Self-Help'),
(7, '1542031907', 'The Taste of Ginger: A Novel', 5.49, 'Mansi Shah', 'WeChat Image_20220110183249.jpg', 'In Mansi Shahâ€™s stunning debut novel, a family tragedy beckons a first-generation immigrant to the city of her birth, where she grapples with her familyâ€™s past in search of where she truly belongs.After her parents moved her and her brother to America, Preeti Desai never meant to tear her family apart. All she did was fall in love with a white Christian carnivore instead of a conventional Indian boy. Years later, with her parents not speaking to her and her controversial relationship in tatters, all Preeti has left is her career at a prestigious Los Angeles law firm.But when Preeti receives word of a terrible accident in the city where she was born, she returns to India, where sheâ€™ll have to face her estranged parentsâ€¦and the complicated past they left behind. Surrounded by the sights and sounds of her heritage, Preeti catches a startling glimpse of her familyâ€™s battles with class, tradition, and sacrifice. Torn between two beautifully flawed cultures, Preeti must now untangle what home truly means to her.', 'Lake Union Publishing', 317, 'Engslish', '2022-01-01', 'Literature & Fiction'),
(8, '1612680194', 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not! Mass Market Paperback', 6.18, 'Robert T. Kiyosaki', 'WeChat Image_20220110183221.jpg', 'It\'s been nearly 25 years since Robert Kiyosakiâ€™s Rich Dad Poor Dad first made waves in the Personal Finance arena.\r\nIt has since become the #1 Personal Finance book of all time... translated into dozens of languages and sold around the world.\r\n\r\nRich Dad Poor Dad is Robert\'s story of growing up with two dads â€” his real father and the father of his best friend, his rich dad â€” and the ways in which both men shaped his thoughts about money and investing. The book explodes the myth that you need to earn a high income to be rich and explains the difference between working for money and having your money work for you.\r\n\r\n20 Years... 20/20 Hindsight\r\nIn the 20th Anniversary Edition of this classic, Robert offers an update on what weâ€™ve seen over the past 20 years related to money, investing, and the global economy. Sidebars throughout the book will take readers â€œfast forwardâ€ â€” from 1997 to today â€” as Robert assesses how the principles taught by his rich dad have stood the test of time.\r\n\r\nIn many ways, the messages of Rich Dad Poor Dad, messages that were criticized and challenged two decades ago, are more meaningful, relevant and important today than they were 20 years ago.\r\n\r\nAs always, readers can expect that Robert will be candid, insightful... and continue to rock more than a few boats in his retrospective.\r\n\r\nWill there be a few surprises? Count on it.\r\n\r\nRich Dad Poor Dad...\r\nâ€¢ Explodes the myth that you need to earn a high income to become rich\r\nâ€¢ Challenges the belief that your house is an asset\r\nâ€¢ Shows parents why they can\'t rely on the school system to teach their kids\r\nabout money\r\nâ€¢ Defines once and for all an asset and a liability\r\nâ€¢ Teaches you what to teach your kids about money for their future financial\r\nsuccess', 'Plata Publishing', 336, 'Engslish', '2017-04-11', 'Business & Money'),
(9, '1585424331', 'Think and Grow Rich: The Landmark Bestseller Now Revised and Updated for the 21st Century (Think and Grow Rich Series)', 22.95, 'Napoleon Hill', 'WeChat Image_20220110183225.jpg', 'Think and Grow Rich has been called the \"Granddaddy of All Motivational Literature.\" It was the first book to boldly ask, \"What makes a winner?\" The man who asked and listened for the answer, Napoleon Hill, is now counted in the top ranks of the world\'s winners himself.\r\nThe most famous of all teachers of success spent \"a fortune and the better part of a lifetime of effort\" to produce the \"Law of Success\" philosophy that forms the basis of his books and that is so powerfully summarized in this one.\r\n\r\nIn the original Think and Grow Rich, published in 1937, Hill draws on stories of Andrew Carnegie, Thomas Edison, Henry Ford, and other millionaires of his generation to illustrate his principles. In the updated version, Arthur R. Pell, Ph.D., a nationally known author, lecturer, and consultant in human resources management and an expert in applying Hill\'s thought, deftly interweaves anecdotes of how contemporary millionaires and billionaires, such as Bill Gates, Mary Kay Ash, Dave Thomas, and Sir John Templeton, achieved their wealth. Outmoded or arcane terminology and examples are faithfully refreshed to preclude any stumbling blocks to a new generation of readers.', 'TarcherPerigee', 320, 'Engslish', '2005-08-18', 'Business & Money'),
(10, '1982137274', 'The 7 Habits of Highly Effective People: 30th Anniversary', 11.9, 'Stephen R. Covey', 'WeChat Image_20220110183229.jpg', '*New York Times bestsellerâ€”over 40 million copies sold*\r\n*The #1 Most Influential Business Book of the Twentieth Century*\r\n\r\nOne of the most inspiring and impactful books ever written, The 7 Habits of Highly Effective People has captivated readers for nearly three decades. It has transformed the lives of presidents and CEOs, educators and parentsâ€”millions of people of all ages and occupations. Now, this 30th anniversary edition of the timeless classic commemorates the wisdom of the 7 Habits with modern additions from Sean Covey.\r\n\r\nThe 7 Habits have become famous and are integrated into everyday thinking by millions and millions of people. Why? Because they work!\r\n\r\nWith Sean Coveyâ€™s added takeaways on how the habits can be used in our modern age, the wisdom of the 7 Habits will be refreshed for a new generation of leaders.\r\n\r\nThey include:\r\nHabit 1: Be Proactive\r\nHabit 2: Begin with the End in Mind\r\nHabit 3: Put First Things First\r\nHabit 4: Think Win/Win\r\nHabit 5: Seek First to Understand, Then to Be Understood\r\nHabit 6: Synergize\r\nHabit 7: Sharpen the Saw\r\n\r\nThis beloved classic presents a principle-centered approach for solving both personal and professional problems. With penetrating insights and practical anecdotes, Stephen R. Covey reveals a step-by-step pathway for living with fairness, integrity, honesty, and human dignityâ€”principles that give us the security to adapt to change and the wisdom and power to take advantage of the opportunities that change creates.', 'Simon & Schuster', 464, 'Engslish', '2020-05-19', 'Business & Money'),
(11, '1577314808', 'The Power of Now: A Guide to Spiritual Enlightenment', 7.13, 'Eckhart Tolle', 'WeChat Image_20220110183232.jpg', 'It\'s no wonder that The Power of Now has sold over 2 million copies worldwide and has been translated into over 30 foreign languages. Much more than simple principles and platitudes, the book takes readers on an inspiring spiritual journey to find their true and deepest self and reach the ultimate in personal growth and spirituality: the discovery of truth and light.\r\n\r\nIn the first chapter, Tolle introduces readers to enlightenment and its natural enemy, the mind. He awakens readers to their role as a creator of pain and shows them how to have a pain-free identity by living fully in the present. The journey is thrilling, and along the way, the author shows how to connect to the indestructible essence of our Being, \"the eternal, ever-present One Life beyond the myriad forms of life that are subject to birth and death.\"\r\n\r\nFeaturing a new preface by the author, this paperback shows that only after regaining awareness of Being, liberated from Mind and intensely in the Now, is there Enlightenment.', 'New World Library', 236, 'Engslish', '2004-08-01', 'Health, Fitness & Dieting'),
(12, '1589795474', 'The Millionaire Next Door: The Surprising Secrets of America\'s Wealthy', 9.79, 'William D. Danko', 'WeChat Image_20220110183235.jpg', 'The bestselling The Millionaire Next Door identifies seven common traits that show up again and again among those who have accumulated wealth. Most of the truly wealthy in this country don\'t live in Beverly Hills or on Park Avenue-they live next door. This new edition, the first since 1998, includes a new foreword for the twenty-first century by Dr. Thomas J. Stanley.', 'Taylor Trade Publishing', 272, 'Engslish', '2010-11-16', 'Biographies & Memoirs'),
(13, '081298160X', 'The Power of Habit: Why We Do What We Do in Life and Business', 9.99, 'Charles Duhigg', 'WeChat Image_20220110183239.jpg', 'NEW YORK TIMES BESTSELLER â€¢ This instant classic explores how we can change our lives by changing our habits.\r\n\r\nNAMED ONE OF THE BEST BOOKS OF THE YEAR BY The Wall Street Journal â€¢ Financial Times\r\n\r\nIn The Power of Habit, award-winning business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed. Distilling vast amounts of information into engrossing narratives that take us from the boardrooms of Procter & Gamble to the sidelines of the NFL to the front lines of the civil rights movement, Duhigg presents a whole new understanding of human nature and its potential. At its core, The Power of Habit contains an exhilarating argument: The key to exercising regularly, losing weight, being more productive, and achieving success is understanding how habits work. As Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.\r\n\r\nWith a new Afterword by the author\r\n \r\nâ€œSharp, provocative, and useful.â€â€”Jim Collins\r\n \r\nâ€œFew [books] become essential manuals for business and living. The Power of Habit is an exception. Charles Duhigg not only explains how habits are formed but how to kick bad ones and hang on to the good.â€â€”Financial Times\r\n \r\nâ€œA flat-out great read.â€â€”David Allen, bestselling author of Getting Things Done: The Art of Stress-Free Productivity\r\n\r\nâ€œYouâ€™ll never look at yourself, your organization, or your world quite the same way.â€â€”Daniel H. Pink, bestselling author of Drive and A Whole New Mind\r\n\r\nâ€œEntertaining . . . enjoyable . . . fascinating . . . a serious look at the science of habit formation and change.â€â€”The New York Times Book Review', 'Random House Trade Paperbacks', 416, 'Engslish', '2014-01-07', 'Health, Fitness & Dieting'),
(14, '857199099', 'The Psychology of Money - hardback: Timeless lessons on wealth, greed, and happiness Hardcover', 9.99, 'Morgan Housel', 'WeChat Image_20220110183243.jpg', 'Doing well with money isnâ€™t necessarily about what you know. Itâ€™s about how you behave. And behavior is hard to teach, even to really smart people. Moneyâ€•investing, personal finance, and business decisionsâ€•is typically taught as a math-based field, where data and formulas tell us exactly what to do. But in the real world people donâ€™t make financial decisions on a spreadsheet. They make them at the dinner table, or in a meeting room, where personal history, your own unique view of the world, ego, pride, marketing, and odd incentives are scrambled together. In The Psychology of Money, award-winning author Morgan Housel shares 19 short stories exploring the strange ways people think about money and teaches you how to make better sense of one of lifeâ€™s most important topics.', 'Harriman House', 242, 'Engslish', '2021-03-02', 'Business & Money'),
(15, '1542030056', 'No Way Back (A Jack McNeal Thriller Book 1)', 5.49, 'J. B. Turner', 'WeChat Image_20220110183246.jpg', 'From the author of the bestselling Jon Reznick Thriller series comes an exhilarating new adventure. When the people he loves most are in danger, Jack McNeal will get revenge...or die trying. NYPD detective Jack McNeal is used to asking the tough questions. But a late-night visit from the Secret Service lands Jack on the other side of the tableâ€”as a suspect in the disappearance of his estranged wife, Caroline, a prominent reporter on the White House beat. When her body is found floating in the Potomac, Jack is overcome by disbelief and despair.Her death seems eerily similar to the suspicious fatality of a young socialite years before. Is the similarity of the two tragic incidents simply a coincidence, or could it be a sign of a murderous orchestrated plot to protect those in the highest echelons of the American government?To avenge Carolineâ€™s death, Jack embarks on a journey into the darkest recesses of power. Suspects aboundâ€”from haunted Special Forces soldiers to ex-CIA to the presidentâ€™s own body man. Along the way, Jack will be forced to decide: Is there a line he wonâ€™t cross to expose the killer?', 'Thomas & Mercer', 301, 'Engslish', '2022-01-01', 'Literature & Fiction');

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `title` text,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`bookid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`userid`, `bookid`, `title`, `quantity`, `amount`, `date`, `price`) VALUES
('12345', 15, 'No Way Back (A Jack McNeal Thriller Book 1)', 1, 5.49, '2022-01-11', 5.49);

-- --------------------------------------------------------

--
-- 테이블 구조 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `title` text,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderid`),
  KEY `bookid` (`bookid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `userid` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `review` text,
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`bookid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `rate`
--

INSERT INTO `rate` (`userid`, `bookid`, `review`, `rating`) VALUES
('1111', 15, 'very nice', 5),
('123', 1, 'asdfasdg', 1),
('123', 15, 'good!', 3),
('1234', 1, '1231453236', 5),
('1234', 15, 'nice!', 5),
('12345', 15, 'very bad!', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `age` smallint(4) NOT NULL DEFAULT '0',
  `contact` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `permission` varchar(4) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`userid`, `password`, `name`, `sex`, `age`, `contact`, `address`, `permission`, `date`) VALUES
('1111', '1111', NULL, 'male', 0, NULL, NULL, 'user', '2022-01-11'),
('123', '123', 'sadds', 'male', 19, '11222222', 'peking', 'user', '2021-12-10'),
('1234', '1234', 'name', 'female', 1, 'contact', 'address', 'user', '2021-12-10'),
('12345', '12345', 'name', 'male', 1, 'contact', 'address', 'user', '2021-12-10'),
('admin', 'admin', 'name', 'female', 1, 'contact', 'address', 'root', '2021-12-11');

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

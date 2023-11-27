-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2023 at 08:26 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u929248875_code_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_information`
--

CREATE TABLE `account_information` (
  `user_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` int(1) NOT NULL,
  `last_active` datetime NOT NULL,
  `creation_type` int(1) NOT NULL COMMENT '1=COR\r\n2=QR',
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_information`
--

INSERT INTO `account_information` (`user_id`, `user_type`, `user_name`, `email`, `password`, `status`, `last_active`, `creation_type`, `otp`) VALUES
(1, 2, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', -1, '2023-09-08 15:30:31', 1, 0),
(2, 2, 'chinnie13', 'flores.chinnievanezza@gmail.com', '8b3fa58c26e9a85385497b575ca8f2e7', 1, '0000-00-00 00:00:00', 0, 0),
(1000000001, 3, 'special', 'special@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0000-00-00 00:00:00', 1, 0),
(1000000002, 3, 'venise', 'Venise@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0000-00-00 00:00:00', 0, 0),
(1000000003, 3, 'cvfflores', 'flores.chinnie@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 1, '0000-00-00 00:00:00', 0, 0),
(1000000004, 3, 'jaina08', 'jainasherine@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 1, '0000-00-00 00:00:00', 0, 0),
(1000000005, 3, 'crischelle', 'crischellestotomas@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 3, '0000-00-00 00:00:00', 0, 0),
(1000000006, 3, 'Liezel', 'LiezelMangulabnan', '482c811da5d5b4bc6d497ffa98491e38', 1, '0000-00-00 00:00:00', 0, 0),
(1000000007, 3, 'alexis', 'alexissanvictores@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 1, '0000-00-00 00:00:00', 0, 0),
(1000000008, 3, 'matcha', 'jhonelllongcop017@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', -1, '0000-00-00 00:00:00', 0, 0),
(1000000009, 3, 'Professional', 'Professional', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0000-00-00 00:00:00', 0, 0),
(1000000010, 3, 'pro', 'pro', '1a1dc91c907325c69271ddf0c944bc72', -1, '0000-00-00 00:00:00', 0, 0),
(1000000011, 3, 'jasper', 'cohenveniseflores@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', -1, '0000-00-00 00:00:00', 0, 0),
(1000000012, 3, 'alleya', 'alleyamauel@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0000-00-00 00:00:00', 0, 0),
(1000000013, 3, 'Ey_m', 'alleyamanuel@gmail.com', 'c28422213ca197a55c6c7a2aedd6c183', 1, '0000-00-00 00:00:00', 0, 0),
(1000000014, 3, 'lkasjdflkj', 'dio.jomar2172@gmail.com', '5e06b84ac4f276aa03afc04fd1e82856', 1, '0000-00-00 00:00:00', 0, 0),
(1000000015, 3, 'pawscode', 'pawscodephillipines@gmail.com', '8b3fa58c26e9a85385497b575ca8f2e7', 1, '0000-00-00 00:00:00', 0, 0),
(2019201854, 1, 'Jhonell', 'jhonell.longcop.b@bulsu.edu.ph', '20677847d4409742dc3e23ecbbc3e0c8', 1, '0000-00-00 00:00:00', 0, 0),
(2020200586, 1, '_iskaaah', 'chezca.mateo.dc@bulsu.edu.ph', 'fdecafe9b9d70848c7f66d7406ded3c2', 1, '0000-00-00 00:00:00', 0, 0),
(2020200595, 1, 'Armando@25', 'armando.naesa.y@bulsu.edu.ph', '5ae42c9053dfad0e4fdf45130ab46bd0', 1, '0000-00-00 00:00:00', 0, 0),
(2020200934, 1, 'cohen', 'cohenvenise.flores.f@bulsu.edu.ph', '482c811da5d5b4bc6d497ffa98491e38', 1, '0000-00-00 00:00:00', 0, 0),
(2020200937, 1, 'mark0100', 'marklaurence.garcia.x@bulsu.edu.ph', '196629d830a15ca05f5fa9e8242a3a18', 1, '0000-00-00 00:00:00', 0, 0),
(2020200950, 1, 'hansjoshua', 'hansjoshua.jimenez.f@bulsu.edu.ph', '355aa018aa10895972efd2da2948bd3d', 1, '0000-00-00 00:00:00', 0, 0),
(2020200963, 1, 'chaeyoungie<3', 'alleyajean.manuel.b@bulsu.edu.ph', 'bd99f813f8c73237065c19e4aa11db28', 1, '0000-00-00 00:00:00', 0, 0),
(2020201001, 1, 'angelviola', 'angelica.viola.r@bulsu.edu.ph', 'bc43bfa6199216d04c7002fc81120909', 1, '0000-00-00 00:00:00', 0, 0),
(2020201002, 1, 'student', 'andrei.calderon.t@bulsu.edu.ph', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0000-00-00 00:00:00', 1, 0),
(2021200021, 1, 'Gnarly!', 'johnpatrick.alcuran.m@bulsu.edu.ph', '599a0b47f46ff7d8fc3f7a58cfe7d39b', 1, '0000-00-00 00:00:00', 0, 0),
(2021200261, 1, 'ramil', 'flores.ramil1967@gmail.com', 'd9ac0dc422bf74936143ccdb4c7bbb6d', 1, '0000-00-00 00:00:00', 0, 0),
(2023000093, 1, 'test-account', 'test@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0000-00-00 00:00:00', 0, 0),
(2023200278, 1, 'chinnie', 'flores.chinnie@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `picture` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `name`, `picture`) VALUES
(1, 'Admin', ''),
(2, 'chinnie flores', '');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `answer` longtext NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `student_id`, `question_id`, `answer`, `creation_datetime`, `status`) VALUES
(5, 2020201002, 4, 'System.out.println(\"Hellow\");', '2023-11-08 06:20:15', 1),
(7, 2020200934, 8, 'A classloader in Java is a subsystem of Java Virtual Machine, dedicated to loading class files when a program is executed; ClassLoader is the first to load the executable file.', '2023-11-08 17:59:41', 1),
(8, 2020200934, 7, 'Java is a widely-used programming language for coding web applications. It has been a popular choice among developers for over two decades, with millions of Java applications in use today. Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself.', '2023-11-08 18:06:05', 1),
(11, 2020200586, 19, 'Python is a computer programming language often used to build websites and software, automate tasks, and analyze data. Python is a general-purpose language, not specialized for any specific problems, and used to create various programmes.', '2023-11-09 05:25:10', 1),
(13, 2020200963, 1, 'System.out.println(\"hello\");', '2023-11-09 05:44:02', 1),
(27, 2020200934, 24, 'developing websites and software, task automation, data analysis, and data visualization', '2023-11-09 15:12:13', 1),
(28, 2020200934, 20, 'developing websites and software, task automation, data analysis, and data visualization', '2023-11-09 15:13:47', 1),
(32, 2020200963, 33, 'JFrame is a class that allows you to crеatе and manage a top-lеvеl window in a Java application. ', '2023-11-15 13:59:21', 1),
(34, 2020200963, 29, 'ReactJS is an open-source JavaScript library used to create user interfaces in a declarative and efficient way. ', '2023-11-15 14:01:45', 1),
(36, 2020200934, 41, '<figure class=\"image\"><img src=\"./../../resource/forum/w3schools548390276.png\"></figure>', '2023-11-19 09:15:59', 1),
(37, 2020200963, 41, '.', '2023-11-21 02:58:28', 1),
(38, 2020200934, 43, '<pre><code class=\"language-plaintext\">&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n    &lt;title&gt;Login&lt;/title&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n    &lt;h2&gt;Login&lt;/h2&gt;\r\n    &lt;form action=\"login_process.php\" method=\"post\"&gt;\r\n        &lt;label for=\"username\"&gt;Username:&lt;/label&gt;&lt;br&gt;\r\n        &lt;input type=\"text\" id=\"username\" name=\"username\"&gt;&lt;br&gt;\r\n        &lt;label for=\"password\"&gt;Password:&lt;/label&gt;&lt;br&gt;\r\n        &lt;input type=\"password\" id=\"password\" name=\"password\"&gt;&lt;br&gt;&lt;br&gt;\r\n        &lt;input type=\"submit\" value=\"Login\"&gt;\r\n    &lt;/form&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;\r\n</code></pre><p><br>&nbsp;</p><p>Explanation:</p>', '2023-11-21 04:50:20', 1),
(39, 2020200586, 45, 'def filter_even_numbers(numbers):\n    return [num for num in numbers if num % 2 == 0]\n\n# Example usage:\nnumbers_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]\nresult = filter_even_numbers(numbers_list)\nprint(result)', '2023-11-21 04:52:33', 1),
(40, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 0),
(41, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 0),
(42, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 0),
(43, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 0),
(44, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 0),
(45, 2020200595, 46, 'The distinction between int and double lies in their data types. Integers (int) can only store whole numbers, while doubles can accommodate both whole numbers and decimals.', '2023-11-21 05:17:18', 1),
(46, 2019201854, 49, '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n\n</body>\n</html>\n', '2023-11-21 05:44:07', 0),
(47, 2019201854, 49, '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n\n</body>\n</html>\n', '2023-11-21 05:44:37', 0),
(48, 2019201854, 49, '\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n\n</body>\n\n', '2023-11-21 05:45:55', 0),
(49, 2019201854, 49, '\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n', '2023-11-21 05:47:12', 0),
(50, 2019201854, 49, 'Hmmm', '2023-11-21 05:47:35', 0),
(51, 2019201854, 49, '\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n', '2023-11-21 05:48:21', 0),
(52, 2020200963, 50, '<!DOCTYPE html>   \n<html>   \n<head>  \n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">  \n<title> Login Page </title>  \n<style>   \nBody {  \n  font-family: Calibri, Helvetica, sans-serif;  \n  background-color: pink;  \n}  \nbutton {   \n       background-color: #4CAF50;   \n       width: 100%;  \n        color: orange;   \n        padding: 15px;   \n        margin: 10px 0px;   \n        border: none;   \n        cursor: pointer;   \n         }   \n form {   \n        border: 3px solid #f1f1f1;   \n    }   \n input[type=text], input[type=password] {   \n        width: 100%;   \n        margin: 8px 0;  \n        padding: 12px 20px;   \n        display: inline-block;   \n        border: 2px solid green;   \n        box-sizing: border-box;   \n    }  \n button:hover {   \n        opacity: 0.7;   \n    }   \n  .cancelbtn {   \n        width: auto;   \n        padding: 10px 18px;  \n        margin: 10px 5px;  \n    }   \n        \n     \n .container {   \n        padding: 25px;   \n        background-color: lightblue;  \n    }   \n</style>   \n</head>    \n<body>    \n    <center> <h1> Student Login Form </h1> </center>   \n    <form>  \n        <div class=\"container\">   \n            <label>Username : </label>   \n            <input type=\"text\" placeholder=\"Enter Username\" name=\"username\" required>  \n            <label>Password : </label>   \n            <input type=\"password\" placeholder=\"Enter Password\" name=\"password\" required>  \n            <button type=\"submit\">Login</button>   \n            <input type=\"checkbox\" checked=\"checked\"> Remember me   \n            <button type=\"button\" class=\"cancelbtn\"> Cancel</button>   \n            Forgot <a href=\"#\"> password? </a>   \n        </div>   \n    </form>     \n</body>     \n</html>  ', '2023-11-21 05:49:32', 1),
(53, 2019201854, 49, '\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    \n', '2023-11-21 05:52:30', 0),
(54, 2019201854, 49, '<p>&nbsp;</p><p>&nbsp; &nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &nbsp; &lt;title&gt;Auto-Open Dropdown&lt;/title&gt;</p><p>&nbsp; &nbsp; &lt;style&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; /* Optional: Add some styling to improve the appearance */</p><p>&nbsp; &nbsp; &nbsp; &nbsp; #myDropdown {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width: 150px;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; &lt;/style&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &nbsp; &lt;select id=\"myDropdown\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option1\"&gt;Option 1&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option2\"&gt;Option 2&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option3\"&gt;Option 3&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- Add more options as needed -→</p><p>&nbsp; &nbsp; &lt;/select&gt;</p><p>&nbsp; &nbsp; &lt;script&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Get the dropdown element</p><p>&nbsp; &nbsp; &nbsp; &nbsp; var dropdown = document.getElementById(\"myDropdown\");</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Add an event listener for focus</p><p>&nbsp; &nbsp; &nbsp; &nbsp; dropdown.addEventListener(\"focus\", function() {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // Simulate a click event when the user focuses on the dropdown</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; var event = new MouseEvent(\"click\", {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bubbles: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; cancelable: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; view: window</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dropdown.dispatchEvent(event);</p><p>&nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp;&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &nbsp; &lt;title&gt;Auto-Open Dropdown&lt;/title&gt;</p><p>&nbsp; &nbsp; &lt;style&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; /* Optional: Add some styling to improve the appearance */</p><p>&nbsp; &nbsp; &nbsp; &nbsp; #myDropdown {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width: 150px;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; &lt;/style&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &nbsp; &lt;select id=\"myDropdown\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option1\"&gt;Option 1&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option2\"&gt;Option 2&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option3\"&gt;Option 3&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- Add more options as needed -→</p><p>&nbsp; &nbsp; &lt;/select&gt;</p><p>&nbsp; &nbsp; &lt;script&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Get the dropdown element</p><p>&nbsp; &nbsp; &nbsp; &nbsp; var dropdown = document.getElementById(\"myDropdown\");</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Add an event listener for focus</p><p>&nbsp; &nbsp; &nbsp; &nbsp; dropdown.addEventListener(\"focus\", function() {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // Simulate a click event when the user focuses on the dropdown</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; var event = new MouseEvent(\"click\", {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bubbles: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; cancelable: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; view: window</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dropdown.dispatchEvent(event);</p><p>&nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp;&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '2023-11-21 05:53:14', 0),
(55, 2019201854, 49, '<p>&nbsp;</p><p>&nbsp; &nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &nbsp; &lt;title&gt;Auto-Open Dropdown&lt;/title&gt;</p><p>&nbsp; &nbsp; &lt;style&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; /* Optional: Add some styling to improve the appearance */</p><p>&nbsp; &nbsp; &nbsp; &nbsp; #myDropdown {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width: 150px;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; &lt;/style&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &nbsp; &lt;select id=\"myDropdown\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option1\"&gt;Option 1&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option2\"&gt;Option 2&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option3\"&gt;Option 3&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- Add more options as needed -→</p><p>&nbsp; &nbsp; &lt;/select&gt;</p><p>&nbsp; &nbsp; &lt;script&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Get the dropdown element</p><p>&nbsp; &nbsp; &nbsp; &nbsp; var dropdown = document.getElementById(\"myDropdown\");</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Add an event listener for focus</p><p>&nbsp; &nbsp; &nbsp; &nbsp; dropdown.addEventListener(\"focus\", function() {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // Simulate a click event when the user focuses on the dropdown</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; var event = new MouseEvent(\"click\", {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bubbles: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; cancelable: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; view: window</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dropdown.dispatchEvent(event);</p><p>&nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp;&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '2023-11-21 05:53:44', 0),
(56, 2020200963, 43, '<ol><li>&lt;!DOCTYPE&nbsp;html<strong>&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;html&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;head&gt;</strong>&nbsp;&nbsp;</li><li><strong>&lt;meta</strong>&nbsp;name=\"viewport\"&nbsp;content=\"width=device-width,&nbsp;initial-scale=1\"<strong>&gt;</strong>&nbsp;&nbsp;</li><li><strong>&lt;title&gt;</strong>&nbsp;Login&nbsp;Page&nbsp;<strong>&lt;/title&gt;</strong>&nbsp;&nbsp;</li><li><strong>&lt;style&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>Body&nbsp;{&nbsp;&nbsp;</li><li>&nbsp;&nbsp;font-family:&nbsp;Calibri,&nbsp;Helvetica,&nbsp;sans-serif;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;background-color:&nbsp;pink;&nbsp;&nbsp;</li><li>}&nbsp;&nbsp;</li><li>button&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;background-color:&nbsp;#4CAF50;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;width:&nbsp;100%;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;color:&nbsp;orange;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding:&nbsp;15px;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;10px&nbsp;0px;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;border:&nbsp;none;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cursor:&nbsp;pointer;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;</li><li>&nbsp;form&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;border:&nbsp;3px&nbsp;solid&nbsp;#f1f1f1;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;</li><li>&nbsp;input[type=text],&nbsp;input[type=password]&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;width:&nbsp;100%;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;8px&nbsp;0;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding:&nbsp;12px&nbsp;20px;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;display:&nbsp;inline-block;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;border:&nbsp;2px&nbsp;solid&nbsp;green;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;box-sizing:&nbsp;border-box;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;</li><li>&nbsp;button:hover&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;opacity:&nbsp;0.7;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;.cancelbtn&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;width:&nbsp;auto;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding:&nbsp;10px&nbsp;18px;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;10px&nbsp;5px;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;.container&nbsp;{&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding:&nbsp;25px;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;background-color:&nbsp;lightblue;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;/style&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;/head&gt;</strong>&nbsp;&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;body&gt;</strong>&nbsp;&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp; <strong>&lt;center&gt;</strong>&nbsp;<strong>&lt;h1&gt;</strong>&nbsp;Student&nbsp;Login&nbsp;Form&nbsp;<strong>&lt;/h1&gt;</strong>&nbsp;<strong>&lt;/center&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp; <strong>&lt;form&gt;</strong>&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;div</strong>&nbsp;class=\"container\"<strong>&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;label&gt;</strong>Username&nbsp;:&nbsp;<strong>&lt;/label&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;input</strong>&nbsp;type=\"text\"&nbsp;placeholder=\"Enter&nbsp;Username\"&nbsp;name=\"username\"&nbsp;required<strong>&gt;</strong>&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;label&gt;</strong>Password&nbsp;:&nbsp;<strong>&lt;/label&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;input</strong>&nbsp;type=\"password\"&nbsp;placeholder=\"Enter&nbsp;Password\"&nbsp;name=\"password\"&nbsp;required<strong>&gt;</strong>&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;button</strong>&nbsp;type=\"submit\"<strong>&gt;</strong>Login<strong>&lt;/button&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;input</strong>&nbsp;type=\"checkbox\"&nbsp;checked=\"checked\"<strong>&gt;</strong>&nbsp;Remember&nbsp;me&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;button</strong>&nbsp;type=\"button\"&nbsp;class=\"cancelbtn\"<strong>&gt;</strong>&nbsp;Cancel<strong>&lt;/button&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forgot&nbsp;<strong>&lt;a</strong>&nbsp;href=\"#\"<strong>&gt;</strong>&nbsp;password?&nbsp;<strong>&lt;/a&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&lt;/div&gt;</strong>&nbsp;&nbsp;&nbsp;</li><li>&nbsp;&nbsp;&nbsp; <strong>&lt;/form&gt;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;/body&gt;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><strong>&lt;/html&gt;</strong>&nbsp;&nbsp;</li></ol><p><br>&nbsp;</p><p>Explanation:</p>', '2023-11-21 05:53:53', 1),
(57, 2019201854, 49, '<p>Answer:</p><p>&lt;!DOCTYPE html&gt;</p><p>&lt;html lang=\"en\"&gt;</p><p>&lt;head&gt;</p><p>&nbsp; &nbsp; &lt;meta charset=\"UTF-8\"&gt;</p><p>&nbsp; &nbsp; &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;</p><p>&nbsp; &nbsp; &lt;title&gt;Auto-Open Dropdown&lt;/title&gt;</p><p>&nbsp; &nbsp; &lt;style&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; /* Optional: Add some styling to improve the appearance */</p><p>&nbsp; &nbsp; &nbsp; &nbsp; #myDropdown {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; width: 150px;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; &lt;/style&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p>&nbsp; &nbsp; &lt;select id=\"myDropdown\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option1\"&gt;Option 1&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option2\"&gt;Option 2&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;option value=\"option3\"&gt;Option 3&lt;/option&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- Add more options as needed -→</p><p>&nbsp; &nbsp; &lt;/select&gt;</p><p>&nbsp; &nbsp; &lt;script&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Get the dropdown element</p><p>&nbsp; &nbsp; &nbsp; &nbsp; var dropdown = document.getElementById(\"myDropdown\");</p><p>&nbsp; &nbsp; &nbsp; &nbsp; // Add an event listener for focus</p><p>&nbsp; &nbsp; &nbsp; &nbsp; dropdown.addEventListener(\"focus\", function() {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // Simulate a click event when the user focuses on the dropdown</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; var event = new MouseEvent(\"click\", {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bubbles: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; cancelable: true,</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; view: window</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; dropdown.dispatchEvent(event);</p><p>&nbsp; &nbsp; &nbsp; &nbsp; });</p><p>&nbsp; &nbsp; &lt;/script&gt;</p><p>&lt;/body&gt;</p><p>&lt;/html&gt;</p><p>&nbsp;</p><p><br>&nbsp;</p><p>Explanation:</p>', '2023-11-21 05:55:02', 1),
(58, 2020200595, 47, 'Constructors in C# are special methods within a class that initialize its object by assigning initial values to its members.', '2023-11-21 05:57:23', 1),
(59, 2020200595, 53, '<?php\necho \"Hello, World!\";\n?>', '2023-11-21 06:13:48', 1),
(60, 2023000093, 54, '<div class=\"row\">\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-student-id\">Student ID:</label>\n                            <label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-name\">Name:</label>\n                            <label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-year-level\">Year Level:</label>\n                            <label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-specialization\">Major:</label>\n                            <label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-user-name\">Username:</label>\n                            <label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-email\">Email:</label>\n                            <label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n                </div>', '2023-11-21 06:20:15', 1),
(61, 2023000093, 54, '\"\n<div class=\"row\">\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-student-id\">Student ID:</label>\n                            <label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-name\">Name:</label>\n                            <label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-year-level\">Year Level:</label>\n                            <label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-specialization\">Major:</label>\n                            <label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-user-name\">Username:</label>\n                            <label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-email\">Email:</label>\n                            <label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n                </div>\n\"', '2023-11-21 06:21:27', 1),
(62, 2023000093, 54, '{\n<div class=\"row\">\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-student-id\">Student ID:</label>\n                            <label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-name\">Name:</label>\n                            <label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-year-level\">Year Level:</label>\n                            <label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-specialization\">Major:</label>\n                            <label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-user-name\">Username:</label>\n                            <label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-email\">Email:</label>\n                            <label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n                </div>\n}', '2023-11-21 06:21:39', 1),
(63, 2023000093, 54, '<code class=\"language-plaintext\">&lt;div class=\"row\"&gt;\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-student-id\"&gt;Student ID:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-name\"&gt;Name:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-year-level\"&gt;Year Level:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-specialization\"&gt;Major:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-user-name\"&gt;Username:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n\n                    &lt;div class=\"col-lg-12\"&gt;\n                        &lt;div class=\"form-group\"&gt;\n                            &lt;label for=\"modal-delete-email\"&gt;Email:&lt;/label&gt;\n                            &lt;label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"&gt;&lt;/label&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;</code>', '2023-11-21 06:22:15', 1),
(64, 2023000093, 54, '<!-- <div class=\"row\">\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-student-id\">Student ID:</label>\n                            <label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-name\">Name:</label>\n                            <label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-year-level\">Year Level:</label>\n                            <label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-specialization\">Major:</label>\n                            <label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-user-name\">Username:</label>\n                            <label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n\n                    <div class=\"col-lg-12\">\n                        <div class=\"form-group\">\n                            <label for=\"modal-delete-email\">Email:</label>\n                            <label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"></label>\n                        </div>\n                    </div>\n                </div>; -->', '2023-11-21 06:24:37', 1),
(65, 2021200261, 53, 'answer', '2023-11-21 12:11:09', 1),
(66, 2021200261, 53, '<p>Answer:</p><p>tesssssssssssssssssssst<br>&nbsp;</p><p>Explanation:</p>', '2023-11-21 12:11:24', 1),
(67, 2020200934, 55, 'Helo', '2023-11-21 12:13:27', 1),
(68, 2023000093, 55, 'Mahal ko po si Cassy', '2023-11-21 12:13:37', 1),
(69, 2023000093, 55, 'Mahal ka ni Cassy!', '2023-11-21 12:15:23', 1),
(70, 2020200934, 57, 'not found on web browser ', '2023-11-23 12:22:47', 1),
(71, 2020200934, 57, 'not found on web browser ', '2023-11-23 12:22:48', 0),
(72, 2020200934, 56, 'Heat the oil in a cooking pot.\nAdd the garlic. ...\nAdd the peppercorns and bay leaves. ...\nPut the pork belly in the cooking pot. ...\nPour the soy sauce and beef broth (or water). ...\nPour-in the vinegar. ...\nTaste your pork adobo and decide to add salt if needed.\nTransfer to a serving plate.', '2023-11-23 12:25:01', 1),
(73, 2020200963, 62, 'https://www.youtube.com/watch?v=MNeX4EGtR5Y', '2023-11-25 11:10:24', 1),
(74, 2020200586, 62, 'C++ is a general-purpose programming language that was developed as an extension of the C programming language. It supports both procedural and object-oriented programming paradigms, offering features like classes, inheritance, polymorphism, and more. C++ is widely used for developing software ranging from system/application software to game development and is known for its efficiency and performance.', '2023-11-25 23:57:07', 1),
(75, 2020200586, 57, 'Error 404, often referred to as \"404 Not Found,\" is an HTTP status code that indicates the server could not find the requested web page. It is a standard response code used when the server cannot locate the requested URL on the server. This could happen due to various reasons, such as a mistyped URL, a deleted page, or a broken link. When a user encounters a 404 error, it means that the server did not find the content they were looking for at the specified web address.', '2023-11-26 00:05:02', 1),
(76, 2020200586, 42, 'Java prioritizes portability and ease of use, while C++ offers more control over system resources and is often chosen for performance-critical tasks.', '2023-11-26 00:11:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachment_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment` varchar(1000) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = account create'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `question_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `type` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `student_id`, `question_id`, `id`, `type`, `creation_datetime`, `status`) VALUES
(39, 2020200934, 41, 37, 1, '2023-11-21 02:58:28', 1),
(40, 2020200963, 43, 38, 1, '2023-11-21 04:50:20', 1),
(41, 2019201854, 45, 39, 1, '2023-11-21 04:52:33', 1),
(42, 2020200586, 46, 40, 1, '2023-11-21 05:17:18', 1),
(43, 2020200586, 46, 41, 1, '2023-11-21 05:17:18', 1),
(44, 2020200586, 46, 42, 1, '2023-11-21 05:17:18', 0),
(45, 2020200586, 46, 43, 1, '2023-11-21 05:17:18', 1),
(46, 2020200586, 46, 44, 1, '2023-11-21 05:17:18', 0),
(47, 2020200586, 46, 45, 1, '2023-11-21 05:17:18', 1),
(48, 2020200595, 49, 46, 1, '2023-11-21 05:44:07', 0),
(49, 2020200595, 49, 47, 1, '2023-11-21 05:44:37', 0),
(50, 2020200595, 49, 16, 2, '2023-11-21 05:45:25', 0),
(51, 2020200595, 49, 48, 1, '2023-11-21 05:45:55', 0),
(52, 2020200595, 49, 49, 1, '2023-11-21 05:47:12', 1),
(53, 2020200595, 49, 50, 1, '2023-11-21 05:47:35', 1),
(54, 2020200595, 49, 51, 1, '2023-11-21 05:48:21', 1),
(55, 2020200595, 49, 53, 1, '2023-11-21 05:52:30', 0),
(56, 2020200595, 49, 54, 1, '2023-11-21 05:53:14', 0),
(57, 2020200595, 49, 55, 1, '2023-11-21 05:53:44', 1),
(58, 2020200595, 49, 57, 1, '2023-11-21 05:55:02', 0),
(59, 2020200937, 47, 58, 1, '2023-11-21 05:57:23', 0),
(60, 2020200586, 53, 59, 1, '2023-11-21 06:13:48', 0),
(61, 2023000093, 54, 18, 2, '2023-11-21 12:03:39', 0),
(62, 2020200586, 53, 65, 1, '2023-11-21 12:11:09', 0),
(63, 2020200586, 53, 66, 1, '2023-11-21 12:11:24', 1),
(64, 2021200261, 55, 67, 1, '2023-11-21 12:13:27', 1),
(65, 2021200261, 55, 68, 1, '2023-11-21 12:13:37', 1),
(66, 2021200261, 55, 69, 1, '2023-11-21 12:15:23', 1),
(67, 2020201001, 57, 70, 1, '2023-11-23 12:22:47', 0),
(68, 2020201001, 57, 71, 1, '2023-11-23 12:22:48', 0),
(69, 2020201001, 56, 72, 1, '2023-11-23 12:25:01', 0),
(70, 2020200963, 62, 74, 1, '2023-11-25 23:57:07', 0),
(71, 2020201001, 57, 75, 1, '2023-11-26 00:05:02', 0),
(72, 2020200934, 42, 76, 1, '2023-11-26 00:11:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_information`
--

CREATE TABLE `question_information` (
  `question_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_information`
--

INSERT INTO `question_information` (`question_id`, `student_id`, `subject_id`, `title`, `description`, `status`, `creation_datetime`) VALUES
(1, 2020201002, 1, 'How to print hello world in Java?', '<p>Description: How to print hello world in Java?</p>', 2, '2023-11-08 00:57:17'),
(2, 2020201003, 1, 'What is Question 2?', '<p>Description:</p><p>&nbsp;</p>', -1, '2023-11-08 01:13:05'),
(3, 2020201002, 2, 'Python ', '<p>Description:</p>', 1, '2023-11-08 03:50:37'),
(4, 2020200934, 1, 'How to print hello in Java?', '<p>Description:</p>', 1, '2023-11-08 04:57:35'),
(5, 2020200934, 1, 'How to print hellow in java', '<p>Description:</p>', 0, '2023-11-08 04:57:36'),
(6, 2020201002, 3, 'How to get sum of 2 numbers in C++', '<p>Description:</p>', 2, '2023-11-08 06:22:45'),
(7, 1000000003, 1, 'What is Java?', '<p>Description:</p>', 2, '2023-11-08 11:09:54'),
(9, 1000000004, 1, 'What are the differences between C++ and Java?', '<p>Description:</p><p><br><br><br><br>&nbsp;</p>', -1, '2023-11-08 11:16:44'),
(10, 1000000006, 1, 'Why is Java a platform independent language?', '<p>Description:</p>', 1, '2023-11-08 11:19:08'),
(11, 1000000006, 1, 'Explain JVM, JRE and JDK.', '<p>Description:</p><p><br><br><br><br>&nbsp;</p>', 2, '2023-11-08 11:19:56'),
(12, 1000000005, 1, 'List the features of the Java Programming language?', '<p>Description:</p>', 2, '2023-11-08 11:21:20'),
(13, 1000000007, 1, 'What are the differences between Heap and Stack Memory in Java?', '<p>Description:</p>', -1, '2023-11-08 11:24:32'),
(14, 2020200934, 1, 'Why is Java not a pure object oriented language?', '<p>Description:</p>', 1, '2023-11-08 11:26:30'),
(15, 2020200934, 1, 'What is the most important function in Java?', '<p>Description:</p>', 2, '2023-11-08 11:29:26'),
(16, 2019201854, 3, 'C++', '<p>How do I declare and initialize variables in C++?</p>', 0, '2023-11-09 01:25:53'),
(17, 2019201854, 3, 'How do I declare and initialize variables in C++?', '', 1, '2023-11-09 01:28:29'),
(18, 2020200586, 7, 'How to retrieve record from database table using SQL?', '<p>How to retrieve record from database table using SQL?</p>', 1, '2023-11-09 03:39:35'),
(22, 2020200963, 8, 'How to use python?', '<p>Description: &nbsp;May gawa na ba kayo kay sir Robin?????<img src=\"./../../resource/forum/4AF8054F-2484-47DC-8D73-BBD7D48DF38D834174998.jpeg\"></p>', 2, '2023-11-09 05:34:42'),
(29, 2020200934, 7, 'what is react js?', '<p>eto latest</p>', 2, '2023-11-13 12:23:26'),
(33, 2020201002, 1, 'Jframe', '<p>What is JFrame?</p>', 2, '2023-11-15 13:46:10'),
(39, 2020200934, 8, 'What is the programming language?', '<p>Description:</p>', 1, '2023-11-16 10:51:36'),
(40, 2020200934, 4, 'What is if else statement?', '<p>Description:</p><p><br><br><br><br>&nbsp;</p>', 1, '2023-11-16 10:52:31'),
(41, 2020200934, 3, 'What is C++?', '<p>What is C++?</p><p><br><br><br><br>&nbsp;</p>', 2, '2023-11-19 09:14:31'),
(42, 2020200934, 10, 'What are the differences between C++ and Java?', '<p>babagsak tayo</p>', 2, '2023-11-21 03:05:30'),
(43, 2020200963, 5, 'How to make a login form using php?', '<p>Description: pahelp po</p>', 2, '2023-11-21 04:47:17'),
(44, 2020200963, 8, 'Pano gumawa ng bar graph gamit yung python?', '<p>Description:</p>', 1, '2023-11-21 04:50:38'),
(45, 2019201854, 8, 'How to write Python function that takes a list of numbers as input and returns a new list containing only the even numbers from the original list?', '', 2, '2023-11-21 04:50:40'),
(46, 2020200586, 3, 'What is the difference between int and double in C++?', '<p>Description:</p>', 2, '2023-11-21 04:56:08'),
(47, 2020200937, 9, 'What are constructors in C#?', '<p>Description:</p>', 2, '2023-11-21 05:04:31'),
(48, 2020200595, 10, 'What is C++ and how does it differ from C#?', '', 1, '2023-11-21 05:04:59'),
(49, 2020200595, 6, 'How can I make the filtering drop-down automatically appear when a user attempts to select an option using JavaScript?', '<p>Description:</p>', 2, '2023-11-21 05:11:29'),
(50, 2020200963, 4, 'This is how to make login form using html', '<p>Description:</p>', 2, '2023-11-21 05:47:49'),
(51, 2020200586, 7, 'Write an SQL query to retrieve the names of employees who earn more than $50,000 from the \"employees\" table.', '<p>Description:</p>', 1, '2023-11-21 05:57:04'),
(52, 2019201854, 10, 'Heloo', '<p><img src=\"./../../resource/forum/IMG_20231121_140240470293385.jpg\">Description:</p><p><br><br><br><br>&nbsp;</p>', 0, '2023-11-21 06:03:04'),
(53, 2020200586, 5, 'Create a simple PHP script that prints \"Hello, World!\"', '<p>Description:</p>', 0, '2023-11-21 06:08:27'),
(54, 2023000093, 1, 'test', '<pre><code class=\"language-plaintext\">&lt;div class=\"row\"&gt;\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-student-id\"&gt;Student ID:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-student-id\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-name\"&gt;Name:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-name\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-year-level\"&gt;Year Level:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-year-level\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-specialization\"&gt;Major:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-specialization\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-user-name\"&gt;Username:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-user-name\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n\r\n                    &lt;div class=\"col-lg-12\"&gt;\r\n                        &lt;div class=\"form-group\"&gt;\r\n                            &lt;label for=\"modal-delete-email\"&gt;Email:&lt;/label&gt;\r\n                            &lt;label for=\"\" id=\"modal-delete-email\" class=\"form-control-static\"&gt;&lt;/label&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n                &lt;/div&gt;</code></pre>', 2, '2023-11-21 06:17:30'),
(55, 2021200261, 10, 'title1', '<p>Description: description1</p>', 2, '2023-11-21 12:09:55'),
(56, 2020201001, 3, 'C++', '<p>how to cook adobong manok?</p>', 2, '2023-11-23 02:12:41'),
(57, 2020201001, 10, 'Error 404', '<p>What is error 404?????????????????</p>', 2, '2023-11-23 02:18:59'),
(58, 2020200934, 10, 'In what programming language are cookies?', '<p>Description:</p>', 0, '2023-11-23 12:27:20'),
(59, 2020200934, 10, 'In what programming language are cookies?', '<p>Description:</p>', 1, '2023-11-23 12:27:20'),
(60, 2020201002, 1, 'Test', '<p>Description: TEst</p>', 1, '2023-11-25 07:10:41'),
(61, 2020201002, 3, 'Test', '<p>Description: Test</p>', 1, '2023-11-25 07:11:26'),
(62, 2020200963, 3, 'What is c++?', '<p>Description:</p>', 2, '2023-11-25 08:02:57'),
(63, 2020200963, 10, 'Hi', '<p>Description: hello</p>', 1, '2023-11-25 08:48:24'),
(64, 2021200021, 1, 'What is java?', '<p>Description:</p>', 1, '2023-11-26 00:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(10) NOT NULL,
  `answer_id` int(10) NOT NULL,
  `rated_by` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `student_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `answer_id`, `rated_by`, `student_id`, `rating`, `student_flag`) VALUES
(1, 1, 1000000001, 2023000093, 1, 1),
(2, 1, 2020201003, 2023000093, 1, 1),
(3, 2, 2020201003, 1000000001, 1, 0),
(4, 2, 2020201002, 1000000001, -1, 0),
(5, 5, 2020200934, 2020201002, 1, 1),
(6, 2, 2020200586, 1000000001, 0, 0),
(7, 6, 2020200963, 1000000007, 1, 0),
(8, 12, 2020200963, 2020200586, 1, 1),
(9, 11, 2020200963, 2020200586, 1, 1),
(10, 7, 2020200963, 2020200934, 1, 1),
(11, 1, 2020200963, 2023000093, -1, 1),
(12, 12, 2019201854, 2020200586, 1, 1),
(13, 15, 1000000003, 2020200934, 1, 1),
(14, 16, 1000000003, 2020200934, 1, 1),
(15, 8, 1000000003, 2020200934, 1, 1),
(16, 11, 2020200950, 2020200586, -1, 1),
(17, 15, 2020200586, 2020200934, 0, 1),
(18, 19, 2020200586, 2020200950, 0, 1),
(19, 10, 2020200586, 2020200963, -1, 1),
(20, 22, 2020200586, 2020200950, -1, 1),
(21, 16, 2020200950, 2020200934, 0, 1),
(22, 17, 2020200586, 2020200950, -1, 1),
(23, 10, 2020200950, 2020200963, -1, 1),
(24, 14, 2020200950, 2019201854, -1, 1),
(25, 18, 2020200586, 2020200950, 1, 1),
(26, 5, 2020200950, 2020201002, -1, 1),
(27, 13, 2020200950, 2020200963, -1, 1),
(28, 2, 2020200950, 1000000001, -1, 0),
(29, 1, 2020200950, 2023000093, -1, 1),
(30, 7, 2020200586, 2020200934, 1, 1),
(31, 8, 2020200950, 2020200934, -1, 1),
(32, 13, 2020200586, 2020200963, 1, 1),
(33, 11, 2020200595, 2020200586, 1, 1),
(34, 12, 2020200595, 2020200586, 1, 1),
(35, 17, 2019201854, 2020200950, -1, 1),
(36, 28, 1000000003, 2020200934, 1, 1),
(37, 7, 1000000003, 2020200934, 1, 1),
(38, 8, 1000000006, 2020200934, 1, 1),
(39, 7, 1000000006, 2020200934, 1, 1),
(40, 16, 1000000006, 2020200934, 1, 1),
(41, 28, 1000000006, 2020200934, 1, 1),
(42, 8, 1000000005, 2020200934, 1, 1),
(43, 7, 1000000005, 2020200934, 1, 1),
(44, 16, 1000000005, 2020200934, 1, 1),
(45, 6, 2020200934, 1000000007, 1, 0),
(46, 24, 2020200963, 2020200950, -1, 1),
(47, 16, 2020200963, 2020200934, -1, 1),
(48, 19, 2020200963, 2020200950, -1, 1),
(49, 14, 2020200963, 2019201854, 1, 1),
(50, 29, 2019201854, 2020200934, -1, 1),
(51, 16, 2019201854, 2020200934, 1, 1),
(52, 19, 2019201854, 2020200950, 1, 1),
(53, 19, 2019201854, 2020200950, 0, 1),
(54, 9, 2020200950, 2020200963, -1, 1),
(55, 23, 2020200950, 2020200586, -1, 1),
(56, 28, 2020200950, 2020200934, -1, 1),
(57, 29, 2020200963, 2020200934, -1, 1),
(58, 27, 2020200963, 2020200934, -1, 1),
(59, 28, 2020201002, 2020200934, 1, 1),
(60, 34, 2020200934, 2020200963, 1, 1),
(61, 33, 2020200934, 2020200963, 1, 1),
(62, 37, 2020200934, 2020200963, 0, 1),
(63, 48, 2020200963, 2019201854, 0, 1),
(64, 54, 2020200595, 2019201854, 1, 1),
(65, 45, 2020200586, 2020200595, 1, 1),
(66, 58, 2020200937, 2020200595, 1, 1),
(67, 57, 2020200595, 2019201854, 1, 1),
(68, 39, 2020200595, 2020200586, 1, 1),
(69, 45, 2023000093, 2020200595, 0, 1),
(70, 60, 2021200261, 2023000093, -1, 1),
(71, 61, 2021200261, 2023000093, 1, 1),
(72, 61, 2021200261, 2023000093, 1, 1),
(73, 52, 2019201854, 2020200963, 1, 1),
(74, 58, 2019201854, 2020200595, 1, 1),
(75, 45, 2019201854, 2020200595, 1, 1),
(76, 39, 2019201854, 2020200586, 1, 1),
(77, 57, 2020200934, 2019201854, 1, 1),
(78, 58, 2020200934, 2020200595, 1, 1),
(79, 74, 2021200021, 2020200586, 1, 1),
(80, 75, 2021200021, 2020200586, 1, 1),
(81, 39, 2021200021, 2020200586, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `answer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`answer_id`, `student_id`, `reply`, `creation_datetime`, `status`, `reply_id`) VALUES
(37, 2020200934, '?', '2023-11-21 03:09:50', 1, 15),
(47, 2019201854, '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Auto-Open Dropdown</title>\n    <style>\n        /* Optional: Add some styling to improve the appearance */\n        #myDropdown {\n            width: 150px;\n        }\n    </style>\n</head>\n<body>\n\n    <select id=\"myDropdown\">\n        <option value=\"option1\">Option 1</option>\n        <option value=\"option2\">Option 2</option>\n        <option value=\"option3\">Option 3</option>\n        <!-- Add more options as needed -->\n    </select>\n\n    <script>\n        // Get the dropdown element\n        var dropdown = document.getElementById(\"myDropdown\");\n\n        // Add an event listener for focus\n        dropdown.addEventListener(\"focus\", function() {\n            // Simulate a click event when the user focuses on the dropdown\n            var event = new MouseEvent(\"click\", {\n                bubbles: true,\n                cancelable: true,\n                view: window\n            });\n            dropdown.dispatchEvent(event);\n        });\n    </script>\n\n</body>\n\n', '2023-11-21 05:45:25', 0, 16),
(57, 2020200595, 'Thanks', '2023-11-21 06:07:29', 1, 17),
(60, 2021200261, '<p><img src=\"./../../resource/forum/w3schools720557671.png\">x</p>', '2023-11-21 12:03:39', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `reported_id` int(10) NOT NULL,
  `detail` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Question\r\n2 = Answer\r\n3 = Reply'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `student_id`, `reported_id`, `detail`, `date_time`, `status`, `type`) VALUES
(16, 2020200586, 52, '', '2023-11-21 06:04:24', 1, 1),
(17, 2021200261, 54, 'inappropriate', '2023-11-21 12:01:44', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `special_account_information`
--

CREATE TABLE `special_account_information` (
  `account_id` varchar(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `job` text NOT NULL,
  `picture` varchar(1024) NOT NULL,
  `id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_account_information`
--

INSERT INTO `special_account_information` (`account_id`, `name`, `job`, `picture`, `id`) VALUES
('1000000001', 'special', 'Web and Mobile Development', '1.jpg', ''),
('1000000002', 'Venise ', 'I.T in accenture', '', ''),
('1000000003', 'Chinnie Vanezza Flores', 'Software Engineer', '', ''),
('1000000004', 'Jaina Sherine Araojo', 'Software Engineer', '', ''),
('1000000005', 'Crischelle Sto Tomas', 'Software Engineer', '', ''),
('1000000006', 'Liezel Mangulabnan', 'Tech Associate', '', ''),
('1000000007', 'Alexis Sanvictores', 'Tech Associate', '', ''),
('1000000008', 'Jhonell Bonifacio Longcop', 'web developer', '', ''),
('1000000009', 'Professional', 'I.T Professional', '', ''),
('1000000010', ' pro', 'i.t', '', ''),
('1000000011', 'jasper', 'Software Engineer', '', ''),
('1000000012', 'alleya', 'Tech Associate', '', ''),
('1000000013', 'Alleya', 'Engineering ', '', 'CB32D7F0-11BB-4A82-A1AF-CD29E56906E7800258933.jpeg'),
('1000000014', 'sdlkfj', 'lkjsdflkj', '', 'logo-codeconnect-colored226551728.png'),
('1000000015', 'Paws Code', 'IT', '1000000015.jpg', 'cutie profile809279313.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `student_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `year_level` int(1) NOT NULL,
  `specialization` varchar(225) NOT NULL,
  `picture` varchar(225) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`student_id`, `email`, `name`, `year_level`, `specialization`, `picture`, `otp`) VALUES
(0, '', ',  ', 0, '', '', 0),
(2018200817, 'carlos.lomuntad.s@bulsu.edu.ph', 'Lomuntad, Carlos Satiada\n', 4, 'Web and Mobile Development', '', 0),
(2019200836, 'jasper.mendoza.s@bulsu.edu.ph', 'Mendoza, Jasper Samson', 4, 'Web and Mobile Development', '', 0),
(2019201774, 'Jhimharry.robles.j@bulsu.edu.ph', 'Robles, Jhim Harry Jimenez', 4, ' Web and Mobile Development', '', 0),
(2019201854, 'jhonell.longcop.b@bulsu.edu.ph', 'Longcop, Jhonell Bonifacio', 4, ' Web and Mobile Development', '2019201854.jpg', 508570),
(2020200411, 'andrei.calderon.t@bulsu.edu.ph', 'Calderon, Andrei Tiotangco', 4, 'Web and Mobile Development', '', 0),
(2020200467, 'emmanuel.bautista.s@bulsu.edu.ph\n', 'Bautista, Emmanuel\n Santos', 4, 'Business Analytics', '', 0),
(2020200468, 'jhounhaekiel.canoza.m@bulsu.edu.ph', 'Canoza, Jhoun Haekiel Martin ', 4, 'Web and Mobile Development', '', 854013),
(2020200489, 'kaycee.cruz.t@bulsu.edu.ph', 'Cruz, Kaycee Tigas', 4, 'Service Management', '', 0),
(2020200494, 'magemma.degracia.d@bulsu.edu.ph\n', 'De gracia, Gemma Delgado', 4, 'Business Analytics', '', 0),
(2020200523, 'genesis.francisco.s@bulsu.edu.ph', 'Francisco , Genesis Samson ', 4, 'Service Management', '', 653666),
(2020200586, 'chezca.mateo.dc@bulsu.edu.ph', 'Mateo, Chezca Dela Cruz', 4, ' Web and Mobile Development', '2020200586.jpg', 650129),
(2020200595, 'armando.naesa.y@bulsu.edu.ph', 'Naesa, Armando Yanto', 4, ' Web and Mobile Development', '2020200595.png', 979773),
(2020200880, 'malikah.alfaro.s@bulsu.edu.ph\n', 'Alfaro, Malikah Sarmiento', 4, 'Business Analytics', '', 0),
(2020200930, 'jaohendrick.esguerra.m@bulsu.edu.ph', 'Esguerra, Jao Hendrick Magat', 4, 'Web and Mobile Development', '', 0),
(2020200934, 'cohenvenise.flores.f@bulsu.edu.ph', 'Flores, Cohen Venise Fajardo', 4, ' Web and Mobile Development', '2020200934.jpg', 342044),
(2020200937, 'marklaurence.garcia.x@bulsu.edu.ph', 'Garcia, Mark Laurence ', 4, ' Web and Mobile Development', '2020200937.jpeg', 907448),
(2020200950, 'hansjoshua.jimenez.f@bulsu.edu.ph', 'Jimenez, Hans Joshua Fordan', 4, ' Web and Mobile Development', '2020200950.jpg', 211349),
(2020200963, 'alleyajean.manuel.b@bulsu.edu.ph', '  Manuel , Alleya Jean Bernardo', 4, ' Web and Mobile Development', '2020200963.jpg', 578226),
(2020200981, 'jhaizzelmae.roxas.t@bulsu.edu.ph', 'Roxas, Jhaizzel Mae Tobias', 4, ' Web and Mobile Development', '', 0),
(2020201001, 'angelica.viola.r@bulsu.edu.ph', 'Viola, Angelica Reyes', 4, ' Web and Mobile Development', '', 230391),
(2020201002, 'student@bulsu.edu.ph', 'Andrei Tiotangco Calderon', 4, 'Web and Mobile Development', '2020201002.png', 0),
(2020201003, 'kyozetsu495@gmail.com', 'Test 2', 4, 'Web and Mobile Development', '', 896283),
(2021200021, 'johnpatrick.alcuran.m@bulsu.edu.ph', 'Alcuran, John Patrick Mayor', 3, 'Service Management', '2021200021.jpeg', 748407),
(2021200251, 'eljohntristan.delrosarioi.c@bulsu.edu.ph', 'Del Rosario , Eljohn Tristan  Cabarobias', 4, 'Business Analytics', '', 0),
(2021200261, 'flores.ramil1967@gmail.com', 'Ramil Flores', 4, 'Business Analytics', '2021200261.png', 972336),
(2021200290, 'iverson.deligente.s@bulsu.edu.ph', 'Deligente, Iverson Sta Juana\n', 3, 'Web and Mobile Development', '', 0),
(2021200493, 'josephadrian.madrideo.m@bulsu.edu.ph\n', 'Madrideo, Joseph Adrian M.', 4, 'Business Analytics', '', 0),
(2021200557, 'jaybee.metucua.d@bulsu.edu.ph\n', 'Metucua , Jaybee Del Rosario', 3, 'Service Management', '', 0),
(2021201186, 'ruth.salazar.dc@bulsu.edu.ph\n', 'Dela Cruz, Ruth Dela Cruz', 4, 'Business Analytics\n', '', 0),
(2022201007, '2022201007@bulsu.edu.ph', 'Del Pilar, Kiyoshi Herrera', 2, 'N/A', '', 0),
(2023000093, 'test@gmail.com', 'Sample', 3, 'Web and Mobile', '', 469820),
(2023200272, '2023200272@bulsu.edu.ph', 'Maiquez, Evette Jillian Rapsing', 1, 'N/A', '', 658745),
(2023200278, 'flores.chinnie@gmail.com', 'Flores, Chinnie Vanezza Fajardo', 3, 'Web and Mobile Development', '', 838172),
(2147483647, 'cohenveniseflores@gmail.com', 'Flores, cohen fajardo', 3, 'tamabay', '', 451748);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(3) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject`, `status`) VALUES
(1, 'Java', 1),
(3, 'C++', 1),
(4, 'HTML', 1),
(5, 'Php', 1),
(6, 'JavaScript', 1),
(7, 'SQL', 1),
(8, 'Python', 1),
(9, 'C#', 1),
(10, 'GeneralQuestion', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_information`
--
ALTER TABLE `account_information`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `question_information`
--
ALTER TABLE `question_information`
  ADD PRIMARY KEY (`question_id`);
ALTER TABLE `question_information` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_account_information`
--
ALTER TABLE `special_account_information`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `question_information`
--
ALTER TABLE `question_information`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD CONSTRAINT `admin_information_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `account_information` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# 📚 MODULE 3: ROW-WISE & COLUMN-WISE FILE SELECTION
## Complete Study Guide + Exam-Style Questions

---

# 🎯 CHAPTER 3 OVERVIEW

**Module Name:** Row-wise and Column-wise File Selection  
**Hours:** 7 hours  
**Marks:** 14 marks (Most important in Module 2-3!)  
**Difficulty:** Medium to Hard  

**What you'll learn:**
- Selecting rows from files (head, tail, grep, sed)
- Selecting columns from files (cut, paste)
- Sorting data (sort, uniq)
- Text transformation (tr, sed)
- Advanced text processing (awk)

---

# 📖 PART 1: DETAILED CONCEPT EXPLANATIONS

## 1.1 UNDERSTANDING TEXT FILE STRUCTURE

### **What is Structured Data?**

Before learning commands, understand how data is organized:

```
Example 1: Simple student file
name age grade marks
john 20 A 85
sarah 19 B 78
mike 21 A 92
emma 20 B 88

Example 2: CSV format (comma-separated)
name,age,grade,marks
john,20,A,85
sarah,19,B,78
mike,21,A,92

Example 3: Colon-separated (/etc/passwd format)
john:1000:1000:/home/john:/bin/bash
sarah:1001:1001:/home/sarah:/bin/bash
root:0:0:/root:/bin/bash
```

### **Key Terms**

```
ROWS (Horizontal)      = Individual lines
                        = Each student is one row
                        
COLUMNS (Vertical)     = Data fields
                        = name, age, grade, marks

FIELD SEPARATOR        = Character separating columns
                        = Space: "john 20"
                        = Comma: "john,20"
                        = Colon: "john:20"
```

### **Visual Representation**

```
                 ↓ Column 1    ↓ Column 2   ↓ Column 3  ↓ Column 4
Row 1 (Header)  name          age         grade       marks
Row 2           john          20          A           85
Row 3           sarah         19          B           78
Row 4           mike          21          A           92
Row 5           emma          20          B           88
```

---

## 1.2 ROW-WISE SELECTION (Selecting Complete Lines)

### **What is Row Selection?**

Selecting complete lines from a file based on criteria.

```
Original file:
Line 1: name age grade marks
Line 2: john 20 A 85
Line 3: sarah 19 B 78
Line 4: mike 21 A 92
Line 5: emma 20 B 88

If I select "rows with grade A":
Line 1: name age grade marks (header)
Line 2: john 20 A 85
Line 4: mike 21 A 92
```

### **Common Row Selection Commands**

---

### **COMMAND 1: `head` - First N Rows**

**Purpose:** Show first N lines of file

**Syntax:**
```bash
head filename.txt              # First 10 lines (default)
head -5 filename.txt           # First 5 lines
head -n 20 filename.txt        # First 20 lines (explicit)
```

**Setup Test File:**
```bash
cat > students.txt << EOF
name age grade marks
john 20 A 85
sarah 19 B 78
mike 21 A 92
emma 20 B 88
alex 22 C 72
EOF
```

**Examples:**

```bash
# Show first 3 lines
head -3 students.txt

Output:
name age grade marks
john 20 A 85
sarah 19 B 78
```

**Use Cases:**
- Preview large files (don't load entire file)
- Check file format/structure
- Get first N records
- Skip header and get data

---

### **COMMAND 2: `tail` - Last N Rows**

**Purpose:** Show last N lines of file

**Syntax:**
```bash
tail filename.txt              # Last 10 lines (default)
tail -5 filename.txt           # Last 5 lines
tail -n 20 filename.txt        # Last 20 lines
tail -f filename.txt           # Follow (keep updating)
```

**Examples:**

```bash
# Show last 3 lines
tail -3 students.txt

Output:
mike 21 A 92
emma 20 B 88
alex 22 C 72
```

**Real-world Use:**
```bash
# Monitor log file in real-time
tail -f /var/log/syslog

# Get last error from system log
tail -1 /var/log/error.log
```

---

### **COMMAND 3: `grep` - Find Matching Rows**

**Purpose:** Select rows matching a pattern

**Syntax:**
```bash
grep "pattern" filename.txt          # Rows containing pattern
grep -i "pattern" filename.txt       # Case insensitive
grep -n "pattern" filename.txt       # Show line numbers
grep -c "pattern" filename.txt       # Count matching rows
grep -v "pattern" filename.txt       # Rows NOT matching
grep -E "regex" filename.txt         # Extended regex
```

**Examples:**

```bash
# Find all students with grade A
grep "A" students.txt

Output:
john 20 A 85
mike 21 A 92

# Find students with age 20
grep "20" students.txt

Output:
john 20 A 85
emma 20 B 88

# Count how many have marks > 80 (using pattern)
grep -c "8[0-9]" students.txt
# Output: 3
```

**Understanding grep Patterns:**
```
grep "A"           = Line contains "A"
grep "^john"       = Line starts with "john"
grep "88$"         = Line ends with "88"
grep "^[a-m]"      = Line starts with a-m characters
grep "[0-9]"       = Line contains any digit
```

---

### **COMMAND 4: `sed` - Stream Editor (Advanced)**

**Purpose:** Edit stream - find, replace, delete rows

**Syntax:**
```bash
sed -n '2,4p' file.txt              # Print lines 2-4
sed '3d' file.txt                   # Delete line 3
sed 's/old/new/' file.txt           # Replace in line
sed -i 's/old/new/g' file.txt       # Replace in file
```

**Examples:**

```bash
# Print lines 2 to 4
sed -n '2,4p' students.txt

Output:
john 20 A 85
sarah 19 B 78
mike 21 A 92

# Delete line 3
sed '3d' students.txt

Output:
name age grade marks
john 20 A 85
mike 21 A 92
emma 20 B 88
alex 22 C 72
```

---

### **REAL EXAMPLE: Analyzing Log File**

```bash
cat > server.log << EOF
2024-03-15 10:00:00 [INFO] Server started
2024-03-15 10:01:00 [ERROR] Connection timeout
2024-03-15 10:02:00 [INFO] Retry connection
2024-03-15 10:03:00 [ERROR] Failed again
2024-03-15 10:04:00 [INFO] Recovery complete
2024-03-15 10:05:00 [ERROR] Disk full
EOF

# Get first 2 lines
head -2 server.log

# Get last error
grep "ERROR" server.log | tail -1

# Count errors
grep -c "ERROR" server.log
```

---

## 1.3 COLUMN-WISE SELECTION (Extracting Specific Fields)

### **What is Column Selection?**

Extracting specific columns from data based on field separator.

```
Original file (3 columns separated by space):
john 20 85
sarah 19 78
mike 21 92

Column 1 (names):       Column 2 (ages):     Column 3 (marks):
john                    20                   85
sarah                   19                   78
mike                    21                   92
```

---

### **COMMAND 1: `cut` - Extract Columns**

**Purpose:** Select specific columns from each line

**Syntax:**
```bash
cut -d: -f1 file.txt              # Field 1, delimiter ':'
cut -d, -f1,3 file.txt            # Fields 1 and 3, delimiter ','
cut -d' ' -f2-4 file.txt          # Fields 2 to 4, delimiter space
cut -c1-5 file.txt                # Characters 1-5 (byte position)
```

**Parameters:**
```
-d delimiter       = Character that separates fields
-f fields          = Which fields to extract
-c characters      = Character positions
```

---

### **EXAMPLE 1: Space-Separated File**

```bash
cat > data.txt << EOF
john 20 A 85
sarah 19 B 78
mike 21 A 92
EOF

# Extract column 1 (name)
cut -d' ' -f1 data.txt

Output:
john
sarah
mike

# Extract columns 1 and 3 (name and grade)
cut -d' ' -f1,3 data.txt

Output:
john A
sarah B
mike A

# Extract columns 2-4 (age, grade, marks)
cut -d' ' -f2-4 data.txt

Output:
20 A 85
19 B 78
21 A 92
```

---

### **EXAMPLE 2: Colon-Separated File**

```bash
cat > passwd.txt << EOF
john:1000:1000:/home/john:/bin/bash
sarah:1001:1001:/home/sarah:/bin/bash
root:0:0:/root:/bin/bash
EOF

# Extract username only
cut -d: -f1 passwd.txt

Output:
john
sarah
root

# Extract username and home directory
cut -d: -f1,5 passwd.txt

Output:
john:/home/john
sarah:/home/sarah
root:/root
```

---

### **EXAMPLE 3: CSV File**

```bash
cat > students.csv << EOF
name,age,grade,marks
john,20,A,85
sarah,19,B,78
mike,21,A,92
EOF

# Extract name and marks
cut -d, -f1,4 students.csv

Output:
name,marks
john,85
sarah,78
mike,92
```

---

### **EXAMPLE 4: Character Position (not delimiter)**

```bash
# Extract first 5 characters from each line
cut -c1-5 students.txt

# If file has:
# john 20 A 85
# sarah 19 B 78

Output:
john 
sarah
```

---

### **COMMAND 2: `paste` - Combine Columns**

**Purpose:** Join columns from multiple files side-by-side

**Syntax:**
```bash
paste file1.txt file2.txt           # Side-by-side with tab
paste -d: file1.txt file2.txt       # Custom delimiter
paste -d, file1.txt file2.txt       # Comma separator
```

---

### **EXAMPLE: Combining Files**

```bash
# Create files
echo -e "john\nsarah\nmike" > names.txt
echo -e "20\n19\n21" > ages.txt
echo -e "A\nB\nA" > grades.txt

# Paste side-by-side
paste names.txt ages.txt grades.txt

Output:
john	20	A
sarah	19	B
mike	21	A

# With comma separator
paste -d, names.txt ages.txt grades.txt

Output:
john,20,A
sarah,19,B
mike,21,A

# With colon separator
paste -d: names.txt ages.txt

Output:
john:20
sarah:19
mike:21
```

---

## 1.4 SORTING DATA

### **COMMAND: `sort` - Arrange Lines**

**Purpose:** Sort lines alphabetically, numerically, or by specific field

**Syntax:**
```bash
sort file.txt                        # Sort alphabetically
sort -r file.txt                     # Reverse order
sort -n file.txt                     # Numeric sort
sort -t: -k2 file.txt                # By field 2, delimiter ':'
sort -t' ' -k3 -rn file.txt          # By field 3, reverse numeric
```

**Parameters:**
```
-r                 = Reverse order (Z to A)
-n                 = Numeric sort (1 < 10 < 100)
-t delimiter       = Field separator
-k field           = Sort by which field
-k field1,field2   = Multiple sort keys
```

---

### **EXAMPLE 1: Alphabetical Sort**

```bash
cat > fruits.txt << EOF
banana
cherry
apple
date
EOF

# Alphabetical sort
sort fruits.txt

Output:
apple
banana
cherry
date

# Reverse alphabetical
sort -r fruits.txt

Output:
date
cherry
banana
apple
```

---

### **EXAMPLE 2: Numeric Sort**

```bash
cat > numbers.txt << EOF
100
20
50
3
EOF

# Wrong way (alphabetical)
sort numbers.txt

Output:
100
20
3
50    ← Wrong! (3 comes after 20)

# Right way (numeric)
sort -n numbers.txt

Output:
3
20
50
100   ← Correct!
```

---

### **EXAMPLE 3: Sort by Specific Field**

```bash
cat > employees.txt << EOF
john:1000:85000
sarah:1001:92000
mike:1002:78000
emma:1003:88000
EOF

# Sort by field 3 (salary), numeric, reverse
sort -t: -k3 -rn employees.txt

Output:
sarah:1001:92000
emma:1003:88000
john:1000:85000
mike:1002:78000
```

---

### **EXAMPLE 4: Complex Sort**

```bash
cat > students.txt << EOF
john 20 A 85
sarah 19 B 78
mike 20 A 92
emma 20 B 88
EOF

# Sort by grade (ascending), then by marks (descending)
sort -t' ' -k3,3 -k4,4rn students.txt

Output:
john 20 A 85
mike 20 A 92
emma 20 B 88
sarah 19 B 78
```

---

## 1.5 REMOVING DUPLICATES

### **COMMAND: `uniq` - Find/Remove Duplicates**

**Purpose:** Remove duplicate consecutive lines or find them

**Syntax:**
```bash
uniq file.txt                        # Remove duplicate lines
uniq -c file.txt                     # Count duplicates
uniq -d file.txt                     # Show only duplicates
uniq -u file.txt                     # Show unique lines only
```

**Important:** File must be SORTED first!

---

### **EXAMPLE 1: Basic Usage**

```bash
cat > items.txt << EOF
apple
apple
banana
banana
banana
cherry
cherry
date
EOF

# Remove duplicates
uniq items.txt

Output:
apple
banana
cherry
date

# Count occurrences
uniq -c items.txt

Output:
  2 apple
  3 banana
  2 cherry
  1 date

# Show only items that appear more than once
uniq -d items.txt

Output:
apple
banana
cherry
```

---

### **EXAMPLE 2: Proper Usage with sort**

```bash
cat > data.txt << EOF
cherry
apple
apple
banana
cherry
EOF

# Wrong way (unsorted)
uniq data.txt

Output:
cherry
apple
banana
cherry    ← Duplicate not removed!

# Right way (sort first)
sort data.txt | uniq

Output:
apple
banana
cherry
```

---

## 1.6 COUNTING TEXT

### **COMMAND: `wc` - Word Count**

**Purpose:** Count lines, words, characters

**Syntax:**
```bash
wc file.txt                          # All counts
wc -l file.txt                       # Lines only
wc -w file.txt                       # Words only
wc -c file.txt                       # Characters only
wc -m file.txt                       # Characters (UTF-8)
```

---

### **EXAMPLE 1: Basic Counting**

```bash
cat > text.txt << EOF
Hello World
This is a test
Final line
EOF

# All counts
wc text.txt

Output:
3 9 36 text.txt
│ │ │
│ │ └─ Characters
│ └─── Words
└───── Lines

# Just lines
wc -l text.txt

Output:
3 text.txt

# Just words
wc -w text.txt

Output:
9 text.txt

# Just characters
wc -c text.txt

Output:
36 text.txt
```

---

### **EXAMPLE 2: Counting in Multiple Files**

```bash
wc -l *.txt

Output:
5 file1.txt
8 file2.txt
3 file3.txt
16 total
```

---

## 1.7 TEXT TRANSFORMATION

### **COMMAND: `tr` - Translate Characters**

**Purpose:** Replace, delete, or transform characters

**Syntax:**
```bash
tr 'abc' 'xyz' < file.txt            # Replace a→x, b→y, c→z
tr 'a-z' 'A-Z' < file.txt            # Lowercase to uppercase
tr -d ' ' < file.txt                 # Delete spaces
tr -s ' ' < file.txt                 # Squeeze multiple spaces
```

**Parameters:**
```
'string1' 'string2'    = Replace chars in string1 with string2
-d                     = Delete characters
-s                     = Squeeze (replace multiple with single)
```

---

### **EXAMPLE 1: Character Replacement**

```bash
# Lowercase to uppercase
echo "hello world" | tr 'a-z' 'A-Z'

Output:
HELLO WORLD

# Specific replacements
echo "hello" | tr 'aeiou' '12345'

Output:
h2ll5
```

---

### **EXAMPLE 2: Delete Characters**

```bash
# Remove spaces
echo "hello world test" | tr -d ' '

Output:
helloworldtest

# Remove digits
echo "abc123def456" | tr -d '0-9'

Output:
abcdef

# Remove vowels
echo "hello" | tr -d 'aeiou'

Output:
hll
```

---

### **EXAMPLE 3: Squeeze Spaces**

```bash
# Multiple spaces to single space
echo "hello    world   test" | tr -s ' '

Output:
hello world test
```

---

## 1.8 ADVANCED: AWK COMMAND

### **What is AWK?**

AWK is a text processing language that processes files line by line.

**Basic Syntax:**
```bash
awk 'pattern { action }' file.txt
awk -F: '{print $1}' file.txt        # Field separator ':'
awk '{print NR, $0}' file.txt        # Line number and content
```

---

### **EXAMPLE 1: Print Specific Columns**

```bash
cat > students.txt << EOF
john 20 85
sarah 19 78
mike 21 92
EOF

# Print column 1
awk '{print $1}' students.txt

Output:
john
sarah
mike

# Print columns 1 and 3
awk '{print $1, $3}' students.txt

Output:
john 85
sarah 78
mike 92
```

---

### **EXAMPLE 2: Filtering Rows**

```bash
# Print students with marks > 80
awk '$3 > 80 {print $1, $3}' students.txt

Output:
john 85
mike 92
```

---

### **EXAMPLE 3: BEGIN and END**

```bash
# Calculate total marks
awk '{sum += $3} END {print "Total:", sum}' students.txt

Output:
Total: 255

# With header and footer
awk 'BEGIN {print "=== Report ==="}
     {sum += $3}
     END {print "Average:", sum/NR}' students.txt

Output:
=== Report ===
Average: 85
```

---

### **EXAMPLE 4: Using Field Separator**

```bash
cat > passwd.txt << EOF
john:1000:1000
sarah:1001:1001
mike:1002:1002
EOF

# Extract usernames and IDs
awk -F: '{print $1, $2}' passwd.txt

Output:
john 1000
sarah 1001
mike 1002
```

---

# 📝 PRACTICE QUESTIONS FOR EXAM

## **SECTION A: VERY EASY (2 marks each)**

### **Question A1: Basic head command**

**Question:** Write a command to display first 5 lines of file "data.txt"

**Answer:**
```bash
head -5 data.txt
```

**Explanation:** 
- `head` displays first lines
- `-5` specifies number of lines

---

### **Question A2: Basic tail command**

**Question:** Write command to show last 3 lines of "input.txt"

**Answer:**
```bash
tail -3 input.txt
```

---

### **Question A3: Basic grep**

**Question:** Find all lines containing "error" in "log.txt"

**Answer:**
```bash
grep "error" log.txt
```

---

### **Question A4: Cut command with space separator**

**Question:** Extract first column from "users.txt" (space-separated)

**Answer:**
```bash
cut -d' ' -f1 users.txt
```

**Explanation:**
- `-d' '` = delimiter is space
- `-f1` = first field

---

### **Question A5: Count lines**

**Question:** Count total number of lines in "file.txt"

**Answer:**
```bash
wc -l file.txt
```

---

### **Question A6: Sort alphabetically**

**Question:** Sort "names.txt" in alphabetical order

**Answer:**
```bash
sort names.txt
```

---

### **Question A7: Remove duplicates**

**Question:** Remove duplicate lines from sorted "items.txt"

**Answer:**
```bash
uniq items.txt
```

---

### **Question A8: Case conversion**

**Question:** Convert "hello world" to uppercase

**Answer:**
```bash
echo "hello world" | tr 'a-z' 'A-Z'
```

---

## **SECTION B: EASY (3 marks each)**

### **Question B1: Cut with colon separator**

**File content:**
```
john:20:A:85
sarah:19:B:78
mike:21:A:92
```

**Question:** Extract names and grades (fields 1 and 3)

**Answer:**
```bash
cut -d: -f1,3 students.txt
```

**Output:**
```
john:A
sarah:B
mike:A
```

---

### **Question B2: Grep with line numbers**

**Question:** Find lines containing "error" with line numbers from "system.log"

**Answer:**
```bash
grep -n "error" system.log
```

**Output example:**
```
5:[ERROR] Connection failed
12:[ERROR] Timeout
```

---

### **Question B3: Sort by specific field**

**File content:**
```
john 20 85
sarah 19 78
mike 21 92
emma 20 88
```

**Question:** Sort by age (field 2) in ascending order

**Answer:**
```bash
sort -t' ' -k2 -n students.txt
```

**Output:**
```
sarah 19 78
john 20 85
emma 20 88
mike 21 92
```

---

### **Question B4: Count occurrences with uniq**

**File content:**
```
apple
apple
banana
banana
banana
cherry
```

**Question:** Count how many times each fruit appears

**Answer:**
```bash
sort fruits.txt | uniq -c
```

**Output:**
```
2 apple
3 banana
1 cherry
```

---

### **Question B5: Combination - head and grep**

**Question:** Show first 5 lines containing "A" from "marks.txt"

**Answer:**
```bash
grep "A" marks.txt | head -5
```

---

### **Question B6: AWK - print specific columns**

**File content:**
```
john:20:A:85
sarah:19:B:78
mike:21:A:92
```

**Question:** Print names and marks only

**Answer:**
```bash
awk -F: '{print $1, $4}' students.txt
```

**Output:**
```
john 85
sarah 78
mike 92
```

---

### **Question B7: Paste command**

**File1 (names.txt):**
```
john
sarah
mike
```

**File2 (ages.txt):**
```
20
19
21
```

**Question:** Combine files side-by-side with comma separator

**Answer:**
```bash
paste -d, names.txt ages.txt
```

**Output:**
```
john,20
sarah,19
mike,21
```

---

### **Question B8: Word count**

**Question:** Count total words in "document.txt"

**Answer:**
```bash
wc -w document.txt
```

---

## **SECTION C: MEDIUM (4-5 marks each)**

### **Question C1: Complex grep with patterns**

**File content:**
```
192.168.1.1 GET /index.html 200
192.168.1.2 GET /admin 401
192.168.1.3 POST /login 200
192.168.1.1 GET /image.jpg 404
```

**Question:** Find all GET requests from server log

**Answer:**
```bash
grep "GET" server.log
```

**Or with line numbers:**
```bash
grep -n "GET" server.log
```

---

### **Question C2: Multiple field extraction and sorting**

**File content:**
```
john:1000:85000
sarah:1001:92000
mike:1002:78000
emma:1003:88000
```

**Question:** 
1. Extract names and salaries
2. Sort by salary (highest first)

**Answer:**
```bash
cut -d: -f1,3 employees.txt | sort -t: -k2 -rn
```

**Output:**
```
sarah:92000
emma:88000
john:85000
mike:78000
```

---

### **Question C3: Filtering and transformation**

**File content:**
```
name grade marks
john A 85
sarah B 78
mike A 92
emma B 88
```

**Question:** 
1. Find students with grade A
2. Show only name and marks
3. Sort by marks (highest first)

**Answer:**
```bash
grep "A" marks.txt | cut -d' ' -f1,4 | sort -t' ' -k2 -rn
```

**Output:**
```
mike 92
john 85
```

---

### **Question C4: AWK with conditions**

**File content:**
```
john 20 85
sarah 19 78
mike 21 92
emma 20 88
```

**Question:** Show names of students with marks > 80

**Answer:**
```bash
awk '$3 > 80 {print $1, $3}' students.txt
```

**Output:**
```
john 85
mike 92
emma 88
```

---

### **Question C5: Combining commands (pipeline)**

**Question:** 
1. Get last 100 lines of log
2. Find "ERROR" entries
3. Count them

**Answer:**
```bash
tail -100 system.log | grep "ERROR" | wc -l
```

---

### **Question C6: Data cleanup with tr and sort**

**File content (messy):**
```
banana
APPLE
cherry
BANANA
Apple
```

**Question:** 
1. Convert all to lowercase
2. Remove duplicates
3. Sort

**Answer:**
```bash
tr 'A-Z' 'a-z' < messy.txt | sort | uniq
```

**Output:**
```
apple
banana
cherry
```

---

### **Question C7: Calculate statistics with AWK**

**File content:**
```
john 85
sarah 78
mike 92
emma 88
```

**Question:** Calculate average marks

**Answer:**
```bash
awk '{sum += $2} END {print "Average:", sum/NR}' marks.txt
```

**Output:**
```
Average: 85.75
```

---

### **Question C8: Field reordering**

**File content:**
```
john,20,A,85
sarah,19,B,78
mike,21,A,92
```

**Question:** Reorder to show: marks, name, age (comma-separated)

**Answer:**
```bash
cut -d, -f4,1,2 students.csv
```

**Output:**
```
85,john,20
78,sarah,19
92,mike,21
```

---

## **SECTION D: HARD (6 marks each)**

### **Question D1: Complex multi-stage pipeline**

**File content (server.log):**
```
2024-01-15 10:00 ERROR Connection failed
2024-01-15 10:01 INFO Retry
2024-01-15 10:02 ERROR Timeout
2024-01-15 10:03 INFO Connected
2024-01-15 10:04 ERROR Failed
2024-01-15 10:05 INFO Success
```

**Question:** 
1. Extract only ERROR lines
2. Show date and error message
3. Count total errors

**Answer:**
```bash
# Show errors with date
grep "ERROR" server.log | cut -d' ' -f1,4-

# Count errors
grep -c "ERROR" server.log
```

---

### **Question D2: Data transformation and analysis**

**File content (sales.csv):**
```
product,quantity,price
apple,10,2.5
banana,20,1.5
orange,15,2.0
apple,25,2.5
banana,10,1.5
```

**Question:** 
1. Extract product and total value (quantity * price)
2. Show products with high volume (qty > 15)
3. Sort by total value (highest first)

**Answer:**
```bash
awk -F, 'NR>1 && $2>15 {print $1, $2*$3}' sales.csv | sort -t' ' -k2 -rn
```

**Output:**
```
apple 62.5
orange 30
```

---

### **Question D3: Log analysis**

**File content (access.log):**
```
192.168.1.1 GET /index 200
192.168.1.2 GET /admin 401
192.168.1.1 POST /api 500
192.168.1.3 GET /index 200
192.168.1.2 GET /index 200
192.168.1.1 GET /image 404
```

**Question:**
1. Find all successful requests (200 status)
2. Extract IP and URL
3. Count unique IPs

**Answer:**
```bash
# Successful requests
grep " 200$" access.log | cut -d' ' -f1,3

# Count unique IPs with 200 status
grep " 200$" access.log | cut -d' ' -f1 | sort | uniq | wc -l
```

---

### **Question D4: Text processing with multiple conditions**

**File content (employees.txt):**
```
john:IT:85000:5
sarah:HR:92000:8
mike:IT:78000:3
emma:HR:88000:6
alex:IT:95000:10
```

**Question:**
1. Find IT employees
2. Extract name, salary, years
3. Sort by salary (highest first)
4. Show only top 2

**Answer:**
```bash
grep "IT" employees.txt | cut -d: -f1,3,5 | sort -t: -k2 -rn | head -2
```

**Output:**
```
alex:95000:10
john:85000:5
```

---

### **Question D5: Combining multiple files**

**File1 (users.txt):**
```
john
sarah
mike
```

**File2 (departments.txt):**
```
IT
HR
IT
```

**File3 (salaries.txt):**
```
85000
92000
78000
```

**Question:** Create one file with: name, department, salary (colon-separated)

**Answer:**
```bash
paste -d: users.txt departments.txt salaries.txt
```

**Output:**
```
john:IT:85000
sarah:HR:92000
mike:IT:78000
```

---

### **Question D6: Complex sorting with multiple keys**

**File content:**
```
john IT 3 85000
sarah HR 5 92000
mike IT 3 78000
emma HR 8 88000
alex IT 10 95000
```

**Question:** Sort by department, then by years (descending), then by salary (descending)

**Answer:**
```bash
sort -k2,2 -k3,3rn -k4,4rn employees.txt
```

**Output:**
```
sarah HR 5 92000
emma HR 8 88000
alex IT 10 95000
john IT 3 85000
mike IT 3 78000
```

---

### **Question D7: AWK with complex logic**

**File content:**
```
john 20 A 85
sarah 19 B 78
mike 21 A 92
emma 20 B 88
alex 22 C 72
```

**Question:** 
1. Show names of students with grade A or B
2. AND marks > 75
3. Sort by marks (highest first)

**Answer:**
```bash
awk '$3 ~ /[AB]/ && $4 > 75 {print $1, $3, $4}' students.txt | sort -t' ' -k3 -rn
```

**Output:**
```
mike A 92
john A 85
emma B 88
```

---

### **Question D8: Data validation and cleanup**

**File content (dirty_data.txt):**
```
apple
APPLE
banana
BANANA
BANANA
cherry
CHERRY
cherry
```

**Question:**
1. Normalize to lowercase
2. Remove duplicates
3. Sort
4. Show count of each

**Answer:**
```bash
tr 'A-Z' 'a-z' < dirty_data.txt | sort | uniq -c
```

**Output:**
```
2 apple
2 banana
2 cherry
```

---

## **SECTION E: REAL-WORLD EXAM QUESTIONS**

### **Exam Question E1: System Log Analysis**

**Scenario:** You have a web server log with 10,000 lines. You need to analyze it.

**File format:**
```
IP_ADDRESS METHOD URL STATUS_CODE RESPONSE_TIME
192.168.1.1 GET /index.html 200 125
192.168.1.2 GET /admin 401 87
192.168.1.3 POST /api/data 500 543
```

**Exam Questions:**
1. Find all failed requests (status code not 200)
2. Extract IP and response time for slow requests (>300ms)
3. Count requests per HTTP method
4. Find most common status codes

**Answers:**

```bash
# Q1: Failed requests
grep -v " 200 " server.log

# Q2: Slow failed requests
grep -v " 200 " server.log | awk '$5 > 300 {print $1, $5}'

# Q3: Count by method
awk '{print $2}' server.log | sort | uniq -c

# Q4: Count status codes
awk '{print $4}' server.log | sort | uniq -c | sort -rn
```

---

### **Exam Question E2: Student Database Processing**

**File:** students.csv
```
name,age,grade,marks,attendance
john,20,A,85,95
sarah,19,B,78,92
mike,21,A,92,88
emma,20,B,88,94
alex,22,C,72,85
```

**Tasks:**
1. Extract names and marks of students with >80 marks
2. Sort by marks (highest first)
3. Calculate average marks for grade A students
4. List students with attendance ≥90 (with all details)

**Answers:**

```bash
# Task 1 & 2
awk -F, '$4 > 80 {print $1, $4}' students.csv | sort -t' ' -k2 -rn

# Task 3
awk -F, '$3=="A" {sum+=$4; count++} END {print "Average:", sum/count}' students.csv

# Task 4
awk -F, '$5 >= 90 {print $0}' students.csv
```

---

### **Exam Question E3: Data File Cleanup and Formatting**

**File:** raw_data.txt (contains mixed data)
```
Apple 10 2.50
apple 15 2.50
APPLE 20 2.50
Banana 25 1.50
BANANA 10 1.50
banana 30 1.50
```

**Tasks:**
1. Normalize product names (lowercase)
2. Remove duplicate products
3. Calculate total quantity per product
4. Format as CSV (product, total_quantity)

**Answers:**

```bash
# 1. Normalize to lowercase
tr 'A-Z' 'a-z' < raw_data.txt > normalized.txt

# 2. Remove duplicates and group
awk '{sum[$1]+=$2} END {for (product in sum) print product "," sum[product]}' normalized.txt | sort

# All in one command
tr 'A-Z' 'a-z' < raw_data.txt | awk '{sum[$1]+=$2} END {for (p in sum) print p, sum[p]}' | sort
```

---

## **EXAM TIPS FOR MODULE 3**

### **Important Points to Remember**

1. **Field Separator is Critical**
   - Space: `cut -d' '` or default
   - Colon: `cut -d:`
   - Comma: `cut -d,`
   - Always specify with `-d`

2. **Commands Order Matters**
   - Use pipes to chain commands
   - left to right execution
   - Output of one = input of next

3. **Sort Before uniq**
   - `uniq` only works on consecutive lines
   - Always: `sort | uniq`

4. **AWK Field Numbering**
   - `$0` = entire line
   - `$1` = first field
   - `$2` = second field, etc.
   - Use `-F` for custom separator

5. **Pipe for Power**
   - Combine multiple commands
   - Each does one job well
   - Together they're powerful

### **Common Mistakes to Avoid**

❌ **Mistake 1:** Using wrong delimiter
```bash
# Wrong - file is colon-separated
cut -d' ' -f1 passwd.txt

# Right
cut -d: -f1 passwd.txt
```

❌ **Mistake 2:** Forgetting to sort before uniq
```bash
# Wrong
uniq data.txt  # Doesn't remove all duplicates

# Right
sort data.txt | uniq
```

❌ **Mistake 3:** Numeric sort vs alphabetic
```bash
# Wrong - treats numbers as text
sort data.txt

# Right
sort -n data.txt
```

❌ **Mistake 4:** Field numbering in cut
```bash
# Wrong - fields don't start at 0
cut -d, -f0 file.csv

# Right
cut -d, -f1 file.csv
```

### **Exam Day Strategy**

1. **Read question carefully** - Understand what's being asked
2. **Identify file format** - Space, comma, colon separated?
3. **Break into steps** - What transformations are needed?
4. **Test locally** - Try command on sample data
5. **Check output** - Does it match expected result?

### **Sample Exam Scenarios**

**Scenario 1: Log analysis (most common)**
- Find specific error pattern
- Extract relevant fields
- Count occurrences
- Sort results

**Scenario 2: Data transformation**
- Change field separator
- Reorder columns
- Filter by condition
- Remove duplicates

**Scenario 3: Statistics calculation**
- Count lines/words
- Calculate totals
- Find averages
- Group by field

**Scenario 4: File cleanup**
- Normalize data
- Remove duplicates
- Standardize format
- Combine files

---

## **PRACTICE EXERCISE ANSWERS**

### **Exercise 1: Quick Commands**

**Setup:**
```bash
cat > data.txt << EOF
charlie 30 developer 95000
alice 25 manager 85000
bob 28 developer 88000
david 35 manager 92000
eve 27 analyst 78000
EOF
```

**Your Questions:**
1. Show first 2 lines
2. Show last 3 lines
3. Find lines with "manager"
4. Count total lines
5. Sort by salary (highest first)
6. Extract names only
7. Extract names and titles

**Your Answers:**
1. `head -2 data.txt`
2. `tail -3 data.txt`
3. `grep "manager" data.txt`
4. `wc -l data.txt`
5. `sort -k4 -rn data.txt`
6. `cut -d' ' -f1 data.txt`
7. `cut -d' ' -f1,3 data.txt`

---

# 🎓 SUMMARY

**Module 3 covers:**
✅ Row selection (head, tail, grep, sed)
✅ Column selection (cut, paste)
✅ Sorting (sort, uniq)
✅ Transformation (tr, sed)
✅ Advanced processing (awk)

**Key skills needed:**
✅ Understanding field separators
✅ Using pipes to chain commands
✅ Sorting and filtering data
✅ Extracting specific information
✅ Combining commands for complex tasks

**Difficulty:** Medium to Hard
**Marks:** 14 marks (important!)
**Practice time:** 7-10 hours for mastery

Good luck with your exam! 🚀

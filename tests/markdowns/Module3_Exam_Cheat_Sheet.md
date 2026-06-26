# ⚡ MODULE 3 EXAM CHEAT SHEET
## Quick Reference for All Commands & Concepts

---

## 🎯 MOST IMPORTANT COMMANDS

### **ROW SELECTION (Select entire lines)**

| Command | What it does | Example |
|---------|------------|---------|
| `head -5` | First 5 lines | `head -5 file.txt` |
| `tail -3` | Last 3 lines | `tail -3 file.txt` |
| `grep "A"` | Lines containing "A" | `grep "error" log.txt` |
| `grep -n "A"` | With line numbers | `grep -n "error" log.txt` |
| `grep -c "A"` | Count matching lines | `grep -c "error" log.txt` |
| `grep -v "A"` | Lines NOT containing "A" | `grep -v "error" log.txt` |
| `sed -n '2,4p'` | Lines 2-4 | `sed -n '2,4p' file.txt` |
| `sed '3d'` | Delete line 3 | `sed '3d' file.txt` |

---

### **COLUMN SELECTION (Extract specific fields)**

| Command | What it does | Example |
|---------|------------|---------|
| `cut -d: -f1` | Field 1 (delimiter :) | `cut -d: -f1 passwd.txt` |
| `cut -d, -f1,3` | Fields 1 and 3 (delimiter ,) | `cut -d, -f1,3 data.csv` |
| `cut -d' ' -f2-4` | Fields 2-4 (space) | `cut -d' ' -f2-4 data.txt` |
| `cut -c1-5` | Characters 1-5 | `cut -c1-5 file.txt` |
| `paste -d: f1 f2` | Combine files with : | `paste -d: names.txt ages.txt` |

---

### **SORTING & FILTERING**

| Command | What it does | Example |
|---------|------------|---------|
| `sort` | Alphabetical sort | `sort names.txt` |
| `sort -r` | Reverse alphabetical | `sort -r names.txt` |
| `sort -n` | Numeric sort | `sort -n numbers.txt` |
| `sort -t: -k2` | By field 2 (delimiter :) | `sort -t: -k2 data.txt` |
| `sort -t' ' -k3 -rn` | Field 3, reverse numeric | `sort -t' ' -k3 -rn data.txt` |
| `sort \| uniq` | Remove duplicates | `sort data.txt \| uniq` |
| `uniq -c` | Count occurrences | `sort data.txt \| uniq -c` |
| `uniq -d` | Show only duplicates | `sort data.txt \| uniq -d` |

---

### **TRANSFORMATION**

| Command | What it does | Example |
|---------|------------|---------|
| `tr 'a-z' 'A-Z'` | Lowercase → Uppercase | `echo "hello" \| tr 'a-z' 'A-Z'` |
| `tr 'A-Z' 'a-z'` | Uppercase → Lowercase | `cat file.txt \| tr 'A-Z' 'a-z'` |
| `tr -d ' '` | Delete spaces | `echo "a b c" \| tr -d ' '` |
| `tr -d '0-9'` | Delete digits | `echo "a1b2c3" \| tr -d '0-9'` |
| `tr -s ' '` | Squeeze spaces | `echo "a    b" \| tr -s ' '` |
| `sed 's/old/new/'` | Replace first | `sed 's/john/JOHN/' file.txt` |
| `sed 's/old/new/g'` | Replace all | `sed 's/john/JOHN/g' file.txt` |
| `wc -l` | Count lines | `wc -l file.txt` |
| `wc -w` | Count words | `wc -w file.txt` |
| `wc -c` | Count characters | `wc -c file.txt` |

---

### **AWK (Advanced text processing)**

| Command | What it does | Example |
|---------|------------|---------|
| `awk '{print $1}'` | Print field 1 | `awk '{print $1}' data.txt` |
| `awk '{print $1, $3}'` | Print fields 1,3 | `awk '{print $1, $3}' data.txt` |
| `awk -F: '{print $1}'` | Field 1, delimiter : | `awk -F: '{print $1}' passwd.txt` |
| `awk '$3 > 80 {print}'` | Rows where field 3 > 80 | `awk '$3 > 80 {print}' marks.txt` |
| `awk '{sum+=$3} END {print sum}'` | Sum of field 3 | `awk '{sum+=$3} END {print sum}' marks.txt` |
| `awk '{sum+=$3} END {print sum/NR}'` | Average | `awk '{sum+=$3} END {print sum/NR}'` |
| `awk 'NR==2'` | Row 2 only | `awk 'NR==2' file.txt` |
| `awk 'NR>1'` | All rows except first | `awk 'NR>1' file.txt` |

---

## 🔑 KEY CONCEPTS TO REMEMBER

### **1. Field Separator is CRITICAL**

```bash
# Space-separated (default)
cut -d' ' -f1

# Colon-separated (/etc/passwd)
cut -d: -f1

# Comma-separated (CSV)
cut -d, -f1

# Tab-separated
cut -d$'\t' -f1
```

**Golden Rule:** Always identify file format FIRST!

---

### **2. Sort BEFORE uniq**

```bash
# WRONG - uniq only removes consecutive duplicates
uniq data.txt

# RIGHT - sort first to find all duplicates
sort data.txt | uniq
```

---

### **3. Numeric vs Alphabetic Sort**

```bash
# WRONG - alphabetic (100 comes before 20)
sort numbers.txt
Output: 100, 20, 3, 50

# RIGHT - numeric
sort -n numbers.txt
Output: 3, 20, 50, 100
```

---

### **4. Field Numbering Starts at 1**

```bash
$1 = first field
$2 = second field
$3 = third field
$0 = entire line

# NOT $0, $1, $2 like programming!
```

---

### **5. Pipes Chain Commands**

```bash
# One command at a time
cat file.txt          (outputs)
        ↓ piped to
grep "error"          (processes)
        ↓ piped to
wc -l                 (counts)

# Full pipeline
cat file.txt | grep "error" | wc -l
```

---

## 📊 EXAM QUESTION PATTERNS

### **Pattern 1: Filter + Extract**
```
Find lines matching X, then show only columns Y and Z

Solution:
grep "X" file.txt | cut -d: -f<Y>,<Z>
```

### **Pattern 2: Transform + Sort**
```
Normalize data, then sort by specific column

Solution:
tr 'A-Z' 'a-z' < file.txt | sort -k2
```

### **Pattern 3: Group + Count**
```
Group same items and count occurrences

Solution:
sort file.txt | uniq -c | sort -rn
```

### **Pattern 4: Multiple Conditions**
```
Find rows with condition1 AND condition2

Solution:
awk '$3 > 80 && $4 ~ /A/ {print}' file.txt
```

### **Pattern 5: Calculate Statistics**
```
Sum, average, or count specific column

Solution:
awk '{sum += $3} END {print sum/NR}' file.txt
```

---

## ⚠️ MOST COMMON MISTAKES

### **Mistake 1: Wrong Delimiter**
```bash
# File is colon-separated but using space
cut -d' ' -f1 /etc/passwd  ❌

# Correct
cut -d: -f1 /etc/passwd    ✅
```

### **Mistake 2: Forgetting -n for Numbers**
```bash
# Treats numbers as text (10 < 2)
sort salary.txt            ❌

# Correct
sort -n salary.txt         ✅
```

### **Mistake 3: Field Numbering Error**
```bash
# Fields start at 1, not 0
cut -d, -f0 data.csv       ❌

# Correct
cut -d, -f1 data.csv       ✅
```

### **Mistake 4: Not Sorting Before uniq**
```bash
# Won't remove all duplicates
sort uniq data.txt         ❌

# Correct
sort data.txt | uniq       ✅
```

### **Mistake 5: Wrong Pipe Order**
```bash
# Grep only works on lines with "error"
grep "error" log.txt | tail -100  ❌
# Get 100 lines first, THEN filter

# Correct (usually)
tail -100 log.txt | grep "error"  ✅
```

---

## 📝 EXAM QUESTION WALKTHROUGH

### **Example Question:**
```
File: employees.csv (comma-separated)
Format: name,department,salary,years

Question: Show employees in IT department, sorted by salary (highest first)
```

### **Solution Step-by-Step:**

```
Step 1: Identify file format
        → Comma-separated
        
Step 2: Understand requirement
        → Filter by department = "IT"
        → Sort by salary descending
        → Show name, salary
        
Step 3: Break into commands
        → grep "IT" (find IT employees)
        → cut -d, -f1,3 (name and salary)
        → sort -t, -k2 -rn (by salary, reverse)
        
Step 4: Build command
        grep "IT" employees.csv | cut -d, -f1,3 | sort -t, -k2 -rn
        
Step 5: Verify
        → Does it filter IT? ✓
        → Does it show name and salary? ✓
        → Is salary sorted high to low? ✓
```

---

## 🚀 QUICK COMMAND BUILDING GUIDE

### **To do THIS...**      → **Use THIS command...**

**Find rows with pattern A**
```bash
grep "A" file.txt
```

**Extract column 3**
```bash
cut -d: -f3 file.txt           # if colon-separated
cut -d, -f3 file.txt           # if comma-separated
awk '{print $3}' file.txt      # if space-separated
```

**Sort by column 2**
```bash
sort -t: -k2 file.txt          # if colon-separated
sort -t, -k2 file.txt          # if comma-separated
```

**Sort numbers (not text)**
```bash
sort -n file.txt
sort -t: -k2 -n file.txt       # by field 2
```

**Remove duplicates**
```bash
sort file.txt | uniq
```

**Count occurrences**
```bash
sort file.txt | uniq -c
```

**Combine multiple operations**
```bash
grep "X" file | cut -d, -f1,3 | sort -n | uniq -c
```

---

## 🎓 BEFORE YOUR EXAM

### **1 Week Before**
- [ ] Complete all 40+ practice questions
- [ ] Focus on HARD questions (Section D & E)
- [ ] Identify weak areas
- [ ] Practice those commands 10+ times

### **3 Days Before**
- [ ] Do timed practice (mimic exam time limits)
- [ ] Create your own test data
- [ ] Test commands on real files
- [ ] Time yourself

### **1 Day Before**
- [ ] Review this cheat sheet
- [ ] Don't practice (rest!)
- [ ] Get good sleep
- [ ] Relax

### **During Exam**
- [ ] Read question CAREFULLY
- [ ] Identify file format FIRST
- [ ] Break question into steps
- [ ] Write command step-by-step
- [ ] Double-check delimiter
- [ ] Verify output format

---

## 💡 QUICK MEMORY TRICKS

**Remember:** "**CGSUT**"

- **C**ut: Extract columns
- **G**rep: Filter rows
- **S**ort: Arrange data
- **U**niq: Remove duplicates
- **T**r: Transform characters

---

## 🔍 SELF-ASSESSMENT

Can you do these without looking at notes?

**Basic (Easy)**
- [ ] Extract column 1 from colon-separated file
- [ ] Find lines containing specific word
- [ ] Sort a file alphabetically
- [ ] Count lines in a file
- [ ] Convert text to uppercase

**Intermediate (Medium)**
- [ ] Extract columns 1 and 3, filter by condition
- [ ] Sort by specific numeric column (highest first)
- [ ] Count how many times each item appears
- [ ] Find lines with multiple conditions
- [ ] Combine multiple files

**Advanced (Hard)**
- [ ] Pipeline 3+ commands together
- [ ] Use AWK to calculate averages
- [ ] Complex sorting with multiple keys
- [ ] Data transformation and cleanup
- [ ] Log file analysis

**If you can do all 15 = You're ready for exam! 🎉**

---

## 📞 LAST-MINUTE REMINDERS

✅ **Always verify delimiter** - Most mistakes!
✅ **Sort before uniq** - It's a rule!
✅ **Test with sample data** - Before final answer
✅ **Read output carefully** - Is it correct?
✅ **Use pipes** - Chain commands for power
✅ **Start simple** - Then build up complexity

---

## 🎯 EXAM STRATEGY

1. **Read question 2 times** - Make sure you understand
2. **Identify file format** - space/comma/colon?
3. **Sketch solution** - Write out steps in notes
4. **Build command** - Step by step
5. **Test mentally** - Will it work?
6. **Write answer** - Clean and correct
7. **Double check** - Any typos?

---

**Good Luck! You've got this! 💪**

Module 3 is about **combining simple commands** to do powerful things.
Master the basics, and you'll ace the exam! 🚀

# 📚 COMPLETE LINUX EXAM ANSWER GUIDE
## Full Marks Strategy + Model Answers

---

# 🎯 EXAM TIPS FOR FULL MARKS

## **Before You Start**
1. **Read all questions** - Don't start answering immediately
2. **Allocate time wisely:**
   - Section A: 10-12 minutes (1 min per question)
   - Section B: 30-35 minutes (5-7 min per question)
   - Section C: 40-45 minutes (8-10 min per question)
3. **Attempt easier sections first** to build confidence
4. **Use diagrams** - They show deeper understanding
5. **Write clearly** - Examiners give marks for clarity

## **During Exam**
- ✅ Define terms clearly
- ✅ Use technical terminology correctly
- ✅ Provide examples (they add marks)
- ✅ Draw diagrams where asked
- ✅ Explain step-by-step logic
- ✅ Show command syntax properly
- ❌ Don't write irrelevant information
- ❌ Don't leave any question blank

## **After Writing Answer**
- Review for spelling/grammar
- Check if you answered ALL parts
- Ensure diagrams are labeled
- Verify code examples are correct

---

# 📋 SECTION A: ONE-MARK QUESTIONS (12 × 1 = 12)

## **Question 1: What is POSIX?**

**Answer:**
POSIX stands for **Portable Operating System Interface**. It is an international standard that defines the application programming interface (API) and the command line interface for Unix-like operating systems. POSIX ensures compatibility between different Unix systems, allowing programs written for one Unix system to run on other POSIX-compliant systems without modification. It standardizes:
- System calls and library functions
- Command-line utilities
- Directory structure
- File system behavior

---

## **Question 2: What is the full form of GNU?**

**Answer:**
GNU stands for **"GNU's Not Unix"**. It is a recursive acronym meaning "GNU is not Unix". GNU is a free software project launched by Richard Stallman in 1983. GNU provides free replacements for Unix software (like bash shell, coreutils, etc.) and is based on free/open-source principles. Linux often uses GNU tools (hence called GNU/Linux).

---

## **Question 3: What is the root directory in Unix?**

**Answer:**
The **root directory** is represented by the symbol **"/"**. It is the top-level directory in the Unix file system hierarchy. All other directories and files are contained within the root directory. It contains important directories like:
- `/bin` - Essential commands
- `/etc` - Configuration files
- `/home` - User home directories
- `/usr` - User programs and data
- `/tmp` - Temporary files

---

## **Question 4: Which command is used to display the current working directory?**

**Answer:**
The **`pwd`** command (Print Working Directory) is used to display the current working directory. When executed, it shows the absolute path of the directory you are currently in.

**Example:**
```bash
$ pwd
/home/user/documents
```

---

## **Question 5: What is the purpose of the chmod command?**

**Answer:**
The **`chmod`** command is used to **change file permissions** in Unix/Linux. It allows users to control who can read, write, and execute files or directories. Permissions can be changed using:
1. **Symbolic method**: `chmod u+x file` (add execute for user)
2. **Numeric method**: `chmod 755 file` (rwxr-xr-x)

---

## **Question 6: What is a soft link?**

**Answer:**
A **soft link** (or symbolic link) is a special file that points to another file or directory. It's like a shortcut to the original file. Created using `ln -s` command.

**Characteristics:**
- Points to filename, not inode
- If original file is deleted, link becomes broken
- Can link to directories
- Can span across different file systems
- Takes extra space and inode

**Example:**
```bash
$ ln -s original.txt shortcut.txt
```

---

## **Question 7: Which command is used to compare two files?**

**Answer:**
The **`diff`** command is used to compare two files and display the differences. It shows which lines are different and how.

**Example:**
```bash
$ diff file1.txt file2.txt
```

**Alternative commands:**
- `cmp` - Compare binary files byte by byte
- `comm` - Compare sorted files line by line

---

## **Question 8: What is the use of the grep command?**

**Answer:**
The **`grep`** command is used to **search for lines matching a pattern** in files. It displays all lines containing the specified pattern or text.

**Basic syntax:**
```bash
grep "pattern" filename
```

**Example:**
```bash
$ grep "error" system.log
[Shows all lines containing "error"]
```

---

## **Question 9: What is the default mode of the VI editor?**

**Answer:**
The **default mode** of the VI editor is **Command Mode**. When you open VI editor, it automatically starts in command mode where:
- You can execute commands
- You cannot type text directly
- Press `i` to enter Insert Mode
- Press `Esc` to return to Command Mode

---

## **Question 10: What is a Zombie Process?**

**Answer:**
A **Zombie Process** is a process that has finished execution but its parent process has not read its exit status. In a zombie state:
- Process is no longer running
- Entry still exists in process table
- Takes minimal system resources
- Shows as `<defunct>` in process list

**How to avoid:**
Parent process should call `wait()` to collect child's exit status.

**Example:**
```bash
ps aux | grep Z
[Shows zombie processes]
```

---

## **Question 11: What is the use of the ps command?**

**Answer:**
The **`ps`** command is used to **display information about running processes**. It shows process ID (PID), parent process ID (PPID), process status, resource usage, and more.

**Common usage:**
```bash
ps              # Current terminal processes
ps aux          # All processes in detail
ps -ef          # Extended format
```

**Important columns:**
- PID - Process ID
- PPID - Parent Process ID
- STAT - Process status
- CMD - Command that started process

---

## **Question 12: What is Shell Programming?**

**Answer:**
**Shell Programming** is writing sequences of Unix commands in a file (shell script) to automate repetitive tasks. A shell script is:
- Text file with sequence of commands
- Executed by shell interpreter (bash, sh, ksh, etc.)
- Can include control structures (if, for, while)
- Can use variables and functions
- File extension: `.sh`

**Example:**
```bash
#!/bin/bash
echo "Hello World"
date
```

---

# ✍️ SECTION B: SHORT ANSWER QUESTIONS (5 marks each)

## **Question B1: Differentiate between Unix and Linux**

**Answer:**

| Feature | Unix | Linux |
|---------|------|-------|
| **Creator** | Created in 1969 at Bell Labs | Created in 1991 by Linus Torvalds |
| **Cost** | Expensive, proprietary | Free and open-source |
| **Source Code** | Closed source | Open source (anyone can view/modify) |
| **Operating Systems** | Solaris, AIX, HP-UX | Ubuntu, CentOS, Fedora, Red Hat |
| **Kernel** | Various kernels | Single Linux kernel |
| **Portability** | Limited to specific hardware | Highly portable (runs on many devices) |
| **User Base** | Large enterprises | Everyone: students, businesses, startups |
| **Licensing** | Proprietary licenses | GPL (General Public License) |
| **Compliance** | Follows POSIX standards | POSIX-compliant |
| **Support** | Commercial support available | Community support + commercial options |

**Key Point:** Linux is based on Unix principles but is a separate, free, open-source operating system that runs on diverse hardware platforms.

---

## **Question B2: Explain the Unix directory structure with a neat diagram**

**Answer:**

Unix has a **hierarchical tree-like directory structure** with root (/) at the top.

**ASCII Diagram:**
```
/                              (Root Directory)
├── /bin                       (Essential commands: ls, cat, bash)
├── /etc                       (Configuration files: passwd, hosts)
├── /home                      (User home directories)
│   ├── /home/john
│   ├── /home/sarah
│   └── /home/mike
├── /usr                       (User programs and data)
│   ├── /usr/bin              (Additional programs)
│   ├── /usr/lib              (Libraries)
│   └── /usr/share            (Shared data)
├── /var                       (Variable data)
│   ├── /var/log              (Log files)
│   └── /var/tmp              (Temporary files)
├── /tmp                       (Temporary files, cleared on reboot)
├── /root                      (Root user's home directory)
├── /dev                       (Device files: sda, tty)
├── /lib                       (System libraries)
├── /boot                      (Boot files and kernel)
├── /opt                       (Optional software packages)
└── /proc                      (Process information)
```

**Important Directories Explained:**

| Directory | Purpose |
|-----------|---------|
| `/bin` | Essential binary executables (commands) |
| `/sbin` | System binary executables (root only) |
| `/etc` | System configuration files |
| `/home` | User home directories |
| `/usr` | User programs, libraries, documentation |
| `/var` | Variable data (logs, cache) |
| `/tmp` | Temporary files |
| `/root` | Root user's home directory |
| `/dev` | Device files (hardware) |
| `/lib` | System libraries |
| `/opt` | Third-party applications |

**Key Characteristics:**
- Hierarchical structure (tree-like)
- Single root (/)
- Everything is a file
- Absolute paths start with /
- Relative paths are relative to current directory

---

## **Question B3: Write short notes on (5 marks total)**

### **(a) chmod**

**chmod** (change mode) is used to **change file and directory permissions**.

**Two Methods:**

**1. Symbolic Method:**
```bash
chmod u+x file.txt          # Add execute for user
chmod g-w file.txt          # Remove write for group
chmod o=r file.txt          # Set others to read-only
chmod a+x script.sh         # Add execute for all
```

**2. Numeric Method:**
```bash
r (read)    = 4
w (write)   = 2
x (execute) = 1

chmod 755 file.txt
[7 = 4+2+1 (owner: read, write, execute)]
[5 = 4+0+1 (group: read, execute)]
[5 = 4+0+1 (others: read, execute)]
```

**Example:**
```bash
chmod 644 document.txt       # rw-r--r-- (owner read/write, others read)
chmod 755 script.sh          # rwxr-xr-x (owner full, others read/execute)
chmod 600 secret.txt         # rw------- (only owner access)
```

---

### **(b) ln**

**ln** (link) command is used to **create links** to files.

**Two Types:**

**1. Hard Link:**
```bash
ln original.txt hardlink.txt
```
- Another name for same file
- Points to same inode
- Delete original, link still works
- Cannot link directories or files on different file systems

**2. Soft Link (Symbolic Link):**
```bash
ln -s original.txt symlink.txt
```
- Shortcut to file
- Points to filename, not inode
- If original deleted, link broken
- Can link directories
- Can span file systems

**Visual:**
```
Hard Link:              Soft Link:
file.txt ──┐            symlink.txt
hardlink ──┤──> Inode   └──> (shortcut) ──> file.txt
           └──> Data
```

---

### **(c) find**

**find** is used to **search for files** based on criteria.

**Syntax:**
```bash
find [path] [criteria]
```

**Common Examples:**
```bash
find ~ -name "*.txt"                # Find all .txt files
find / -size +10M                   # Files larger than 10MB
find ~ -type f -mtime -7            # Files modified in last 7 days
find ~ -name "report*" -type f      # Files starting with "report"
find ~ -type d                      # All directories
find ~ -name "*.log" -delete         # Find and delete .log files
```

---

### **(d) pipe (|)**

**Pipe (|)** is used to **send output of one command as input to another**.

**Syntax:**
```bash
command1 | command2 | command3
```

**Examples:**
```bash
cat file.txt | grep "error"          # Find errors in file
ps aux | grep "python"               # Find python processes
cat data.txt | sort | uniq           # Sort and remove duplicates
find . -name "*.txt" | wc -l         # Count .txt files
```

**Benefit:** Commands work together to accomplish complex tasks.

---

### **(e) redirection (> and >>)**

**Redirection** is used to **send output to files** instead of terminal.

**> (Overwrite):**
```bash
echo "Hello" > output.txt             # Creates new file (overwrites if exists)
ls -la > directory_list.txt           # Save directory listing
```

**>> (Append):**
```bash
echo "New line" >> output.txt         # Adds to end of file
date >> log.txt                       # Appends date to log
```

**Other Redirections:**
```bash
< (input)           # Send file as input
2> (errors)         # Redirect errors
2>&1 (both)         # Redirect both output and errors
```

**Example:**
```bash
grep "error" *.log > errors.txt       # Save errors to file
command 2> errors.log                 # Save errors to file
ls *.txt 2>&1 > output.txt            # Save everything to file
```

---

## **Question B4: Explain the basic modes of the VI Editor with suitable examples**

**Answer:**

VI editor has **two main modes**:

### **1. Command Mode (Default)**

**When:** VI starts in Command Mode
**What you can do:** Execute commands, delete, copy, paste, search

**Important Commands:**

| Command | Action |
|---------|--------|
| `h, j, k, l` | Move cursor left, down, up, right |
| `w` | Next word |
| `b` | Previous word |
| `dd` | Delete line |
| `yy` | Copy line |
| `p` | Paste below |
| `u` | Undo |
| `ctrl+r` | Redo |
| `/word` | Search forward |
| `?word` | Search backward |
| `n` | Next match |

**Example Usage:**
```bash
$ vi myfile.txt
[VI opens in Command Mode]

[User can type: dd to delete current line]
[User can type: yy to copy current line]
[User can type: 5dd to delete 5 lines]
```

---

### **2. Insert Mode**

**When:** Press `i`, `a`, `o` from Command Mode
**What you can do:** Type and edit text

**How to Enter Insert Mode:**

| Key | Function |
|-----|----------|
| `i` | Insert at cursor position |
| `a` | Append after cursor |
| `I` | Insert at beginning of line |
| `A` | Append at end of line |
| `o` | Open new line below |
| `O` | Open new line above |

**Example:**
```bash
[In Command Mode]
i              [Press 'i' to enter Insert Mode]
[Now you can type text]
This is my text    [Type whatever you want]
Esc            [Press Escape to exit Insert Mode]
```

---

### **3. Last-line Mode (Ex Mode)**

**When:** Press `:` from Command Mode
**What you can do:** Save, quit, replace, set options

**Common Commands:**

| Command | Function |
|---------|----------|
| `:w` | Save file |
| `:q` | Quit |
| `:wq` | Save and quit |
| `:q!` | Quit without saving |
| `:s/old/new/` | Replace in current line |
| `:1,5s/old/new/g` | Replace in lines 1-5 |
| `:%s/old/new/g` | Replace entire file |
| `:set nu` | Show line numbers |

**Example:**
```bash
[In Command Mode]
:              [Press ':' to enter Last-line Mode]
:%s/john/JOHN/g    [Replace all "john" with "JOHN"]
[Press Enter]
:wq            [Save and quit]
```

---

## **Question B5: What is grep? Explain any five commonly used options**

**Answer:**

**grep** stands for **Global Regular Expression Print**. It is used to **search for lines matching a pattern** in files.

**Syntax:**
```bash
grep [options] "pattern" filename
```

---

### **Five Most Commonly Used Options:**

### **1. `-i` (Ignore Case)**

**Function:** Search is case-insensitive

**Example:**
```bash
grep -i "ERROR" system.log
[Will find: ERROR, error, Error, ErRoR]

Without -i:
grep "ERROR" system.log
[Will only find: ERROR]
```

---

### **2. `-n` (Show Line Numbers)**

**Function:** Display line numbers with matching lines

**Example:**
```bash
grep -n "error" log.txt

Output:
5:[ERROR] Connection failed
12:[ERROR] Timeout
18:[ERROR] Server down
```

---

### **3. `-c` (Count Matches)**

**Function:** Count number of matching lines

**Example:**
```bash
grep -c "error" log.txt

Output:
3
[Means 3 lines contain "error"]
```

---

### **4. `-v` (Invert Match)**

**Function:** Show lines that DON'T match pattern

**Example:**
```bash
grep -v "error" log.txt
[Shows all lines EXCEPT those with "error"]

grep -v "^#" config.txt
[Shows all lines except comments]
```

---

### **5. `-r` (Recursive Search)**

**Function:** Search in directory and subdirectories

**Example:**
```bash
grep -r "TODO" /home/projects
[Searches all files in projects folder]

grep -r "password" /etc
[Searches for "password" in /etc directory]
```

---

### **Bonus Options:**

| Option | Function |
|--------|----------|
| `-l` | Show only filenames with matches |
| `-A 3` | Show 3 lines after match |
| `-B 2` | Show 2 lines before match |
| `-C 2` | Show 2 lines before and after |

**Example:**
```bash
grep -n -i "error" log.txt      # Combine options
grep -r -c "pattern" /path      # Recursive + count
```

---

## **Question B6: Explain the ps, top, and nice commands**

**Answer:**

### **1. ps Command (Process Status)**

**Purpose:** Display information about running processes

**Syntax:**
```bash
ps [options]
```

**Common Usage:**

```bash
ps                          # Current terminal processes
ps aux                      # All processes in detail
ps -ef                      # Extended format
ps -u username              # Processes of specific user
ps aux | grep "python"      # Find specific process
```

**Output Explanation:**
```
USER   PID  PPID %CPU %MEM   CMD
john   100  1    2.5  10.5   firefox
sarah  105  1    1.2  5.3    gedit
```

**Important Columns:**
- **PID:** Process ID (unique identifier)
- **PPID:** Parent Process ID
- **%CPU:** CPU usage percentage
- **%MEM:** Memory usage percentage
- **CMD:** Command that started process
- **STAT:** Process status (R-running, S-sleeping, Z-zombie)

---

### **2. top Command (Real-time Monitor)**

**Purpose:** Display real-time process monitoring (like Task Manager)

**Syntax:**
```bash
top
```

**What it shows:**
```
top - 10:30:45 up 5 days, 2:15
Tasks: 156 total, 2 running, 154 sleeping
%Cpu(s): 12.5 us, 3.2 sy, 84.3 id
MiB Mem: 7823.4 total, 4562.1 used

PID USER    %CPU %MEM  VIRT  RES   CMD
100 john    12.5  5.8  2345M 456M  firefox
101 sarah    3.2  3.0  1234M 234M  gedit
102 root     0.8  1.1   567M  89M  nginx
```

**Interactive Commands (while in top):**
- `q` = Quit
- `P` = Sort by CPU usage
- `M` = Sort by Memory usage
- `k` = Kill process
- `r` = Change priority
- `Space` = Refresh

---

### **3. nice Command (Set Process Priority)**

**Purpose:** Run command with different priority level

**Syntax:**
```bash
nice [priority] command
```

**Priority Range:** -20 (highest) to 19 (lowest)

**Examples:**
```bash
nice -n 10 long_process      # Run with lower priority
nice -n -5 fast_process      # Run with higher priority
```

**Viewing Current Priority:**
```bash
ps -l
[Shows "NI" column for nice value]

top
[Shows "NI" column]
```

**Changing Priority of Running Process:**
```bash
renice -n 5 -p 1234          # Change process 1234 priority to 5
```

**Relationship:**
```
Lower nice value = Higher priority (gets more CPU time)
Higher nice value = Lower priority (gets less CPU time)

nice -n -10 command          [High priority]
nice -n 0 command            [Normal priority]
nice -n 10 command           [Low priority]
```

---

## **Question B7: Discuss Shell variables and command substitution with examples**

**Answer:**

### **1. Shell Variables**

**Definition:** Variables are containers that store values used in scripts

**Types of Variables:**

#### **A. User-defined Variables**

**Creating:**
```bash
name="John"
age=25
city="New York"
```

**Using (with $ prefix):**
```bash
echo $name          # Output: John
echo $age           # Output: 25
echo "Hello $name"  # Output: Hello John
```

**Example Script:**
```bash
#!/bin/bash
first_name="Alice"
last_name="Smith"
echo "Welcome $first_name $last_name"

# Output: Welcome Alice Smith
```

---

#### **B. Environment Variables**

**Definition:** Predefined variables available to all processes

**Common Environment Variables:**

| Variable | Value |
|----------|-------|
| `$HOME` | User's home directory |
| `$USER` | Current username |
| `$PATH` | Command search directories |
| `$PWD` | Current working directory |
| `$SHELL` | Current shell |
| `$HOSTNAME` | Computer name |

**Viewing:**
```bash
echo $HOME          # /home/username
echo $USER          # username
echo $PWD           # /current/directory
```

---

#### **C. Special Variables**

| Variable | Meaning |
|----------|---------|
| `$0` | Script name |
| `$1, $2, $3` | First, second, third arguments |
| `$@` | All arguments |
| `$#` | Number of arguments |
| `$?` | Exit status of last command |
| `$$` | Current process ID |

**Example:**
```bash
#!/bin/bash
echo "Script name: $0"
echo "First argument: $1"
echo "All arguments: $@"
echo "Number of arguments: $#"

# Run: ./script.sh hello world
# Output:
# Script name: ./script.sh
# First argument: hello
# All arguments: hello world
# Number of arguments: 2
```

---

### **2. Command Substitution**

**Definition:** Using output of one command as input to another

**Syntax:**
```bash
variable=$(command)      # Modern method
variable=`command`       # Old method
```

**Examples:**

**Example 1: Date**
```bash
current_date=$(date)
echo "Today is $current_date"

# Output: Today is Thu Mar 15 10:30:45 UTC 2024
```

**Example 2: File Count**
```bash
file_count=$(ls -1 | wc -l)
echo "Number of files: $file_count"

# If 10 files in directory:
# Output: Number of files: 10
```

**Example 3: Current User**
```bash
user=$(whoami)
echo "Current user: $user"

# Output: Current user: john
```

**Example 4: System Information**
```bash
hostname=$(uname -n)
kernel=$(uname -r)
echo "Hostname: $hostname, Kernel: $kernel"

# Output: Hostname: mycomputer, Kernel: 5.10.0
```

---

### **Practical Script Using Variables and Command Substitution:**

```bash
#!/bin/bash

# Variables
name="$1"
current_date=$(date +%Y-%m-%d)
backup_dir="/backup"

# Using variables
echo "User: $name"
echo "Date: $current_date"

# Creating backup filename
backup_file="${backup_dir}/${name}_backup_${current_date}.tar.gz"
echo "Backup file: $backup_file"

# Using command substitution
user_count=$(who | wc -l)
echo "Logged in users: $user_count"

# Conditional
if [ $user_count -gt 5 ]; then
    echo "Many users logged in"
else
    echo "Few users logged in"
fi
```

---

## **Question B8: Explain different types of loops in Shell Programming**

**Answer:**

Loops are used to **repeat a block of commands** multiple times.

### **1. for Loop**

**Purpose:** Iterate over a list of values

**Syntax:**
```bash
for variable in list
do
    commands
done
```

**Example 1: Loop through list**
```bash
#!/bin/bash
for fruit in apple banana cherry
do
    echo "Fruit: $fruit"
done

# Output:
# Fruit: apple
# Fruit: banana
# Fruit: cherry
```

**Example 2: Loop through numbers**
```bash
#!/bin/bash
for i in {1..5}
do
    echo "Number: $i"
done

# Output: Number: 1, 2, 3, 4, 5
```

**Example 3: Loop through files**
```bash
#!/bin/bash
for file in *.txt
do
    echo "Processing $file"
done

# Processes all .txt files
```

**Example 4: C-style for loop**
```bash
#!/bin/bash
for ((i=1; i<=5; i++))
do
    echo "Count: $i"
done

# Output: Count: 1, 2, 3, 4, 5
```

---

### **2. while Loop**

**Purpose:** Repeat while condition is true

**Syntax:**
```bash
while [ condition ]
do
    commands
done
```

**Example 1: Simple counter**
```bash
#!/bin/bash
count=1
while [ $count -le 5 ]
do
    echo "Count: $count"
    count=$((count + 1))
done

# Output: Count: 1, 2, 3, 4, 5
```

**Example 2: Read file line by line**
```bash
#!/bin/bash
while IFS= read -r line
do
    echo "Line: $line"
done < myfile.txt

# Reads each line from file
```

**Example 3: Menu loop**
```bash
#!/bin/bash
choice=0
while [ $choice -ne 3 ]
do
    echo "1. Option 1"
    echo "2. Option 2"
    echo "3. Exit"
    read choice
done
```

---

### **3. until Loop**

**Purpose:** Repeat until condition becomes true (opposite of while)

**Syntax:**
```bash
until [ condition ]
do
    commands
done
```

**Example:**
```bash
#!/bin/bash
count=1
until [ $count -gt 5 ]
do
    echo "Count: $count"
    count=$((count + 1))
done

# Output: Count: 1, 2, 3, 4, 5
# (Continues UNTIL count is greater than 5)
```

---

### **4. Loop Control Statements**

#### **break - Exit loop**
```bash
for i in {1..10}
do
    if [ $i -eq 5 ]
    then
        break      # Exit loop when i = 5
    fi
    echo $i
done

# Output: 1, 2, 3, 4
```

#### **continue - Skip iteration**
```bash
for i in {1..5}
do
    if [ $i -eq 3 ]
    then
        continue   # Skip when i = 3
    fi
    echo $i
done

# Output: 1, 2, 4, 5
```

---

### **Comparison of Loops**

| Loop | Use When |
|------|----------|
| **for** | Known number of iterations |
| **while** | Unknown iterations, check condition |
| **until** | Opposite of while |

---

# 📖 SECTION C: LONG ANSWER QUESTIONS (15 marks each)

## **Question C1 (5 + 5 + 5)**

### **Part (a): Explain the Unix System Architecture with a neat diagram (5 marks)**

**Answer:**

Unix System Architecture is **layered** with each layer depending on the layer below it.

```
┌─────────────────────────────────────────────┐
│   Layer 5: APPLICATION LAYER                │
│   (User Applications: Firefox, VS Code, etc)│
├─────────────────────────────────────────────┤
│   Layer 4: SHELL & UTILITIES LAYER          │
│   (bash, sh, grep, sed, awk, find, etc)    │
├─────────────────────────────────────────────┤
│   Layer 3: SYSTEM CALL INTERFACE            │
│   (read, write, open, close, fork, etc)    │
├─────────────────────────────────────────────┤
│   Layer 2: KERNEL LAYER                     │
│   (Process Management, Memory Management,   │
│    File System, Device Drivers, I/O)       │
├─────────────────────────────────────────────┤
│   Layer 1: HARDWARE LAYER                   │
│   (CPU, RAM, Hard Disk, Network Card)      │
└─────────────────────────────────────────────┘
```

---

### **Detailed Explanation:**

#### **Layer 1: Hardware**
- Physical components of computer
- CPU (processor), RAM (memory), Hard Disk, Network Card
- Cannot be accessed directly by applications

---

#### **Layer 2: Kernel**
- **Core of operating system**
- Manages all system resources
- **Functions:**
  - **Process Management:** Controls which process runs when, allocates CPU time
  - **Memory Management:** Allocates RAM to processes, manages virtual memory
  - **File System Management:** Organizes and manages files
  - **Device Management:** Controls printers, keyboards, monitors
  - **Security:** User authentication, permissions, access control

---

#### **Layer 3: System Call Interface**
- **Bridge between applications and kernel**
- Applications cannot access kernel directly (for security)
- System calls are requests to kernel
- Examples: `open()`, `read()`, `write()`, `fork()`, `exit()`

**Example:**
When you write `cat file.txt`, the application calls system calls:
1. `open("/path/to/file")` - Opens file
2. `read()` - Reads data from file
3. `write()` - Writes to terminal
4. `close()` - Closes file

---

#### **Layer 4: Shell & Utilities**
- **Command-line interpreter** (shell: bash, sh, zsh)
- **Utility commands:**
  - File manipulation: ls, cp, mv, rm
  - Text processing: grep, sed, awk
  - System information: ps, top, df
- Shell interprets user commands and calls appropriate system calls

---

#### **Layer 5: Applications**
- **User programs and applications**
- Firefox, VS Code, Games, etc.
- Written in C, Python, Java, etc.
- Use shell commands or system calls to accomplish tasks

---

### **Key Points:**

✅ **Layered approach:** Each layer is independent
✅ **Protection:** Applications cannot directly access hardware
✅ **Abstraction:** Complexity is hidden from users
✅ **Modularity:** Each layer can be modified independently
✅ **Efficiency:** Kernel controls all resources

---

### **Part (b): Compare Unix and Linux (5 marks)**

**Answer:**

Detailed comparison already provided in Section B, Question B1. Here's a summary version suitable for 5 marks:

**Unix** is the **original operating system** created in 1969 at Bell Labs. It is proprietary, expensive, and follows strict POSIX standards.

**Linux** is a **free, open-source operating system** created by Linus Torvalds in 1991. It is based on Unix principles but is a separate system that runs on diverse hardware.

**Main Differences:**

1. **Cost:** Unix is expensive; Linux is free
2. **Source Code:** Unix is closed; Linux is open
3. **Developer:** Unix created at Bell Labs; Linux by community
4. **Licensing:** Unix proprietary; Linux GPL
5. **Hardware:** Unix limited; Linux runs everywhere
6. **User Base:** Unix for enterprises; Linux for everyone
7. **Customization:** Unix limited; Linux highly customizable
8. **Community:** Unix commercial support; Linux community + commercial

---

### **Part (c): Explain the Unix directory structure (5 marks)**

**Answer:**

Detailed explanation already provided in Section B, Question B2. Here's the summary:

**Directory Structure Overview:**

The Unix file system is **hierarchical** with root (/) at the top:

```
/                           Root Directory
├── /bin                    Essential commands
├── /etc                    Configuration files
├── /home                   User directories
├── /usr                    User programs
├── /var                    Variable data (logs)
├── /tmp                    Temporary files
├── /root                   Root user's home
├── /dev                    Device files
├── /lib                    System libraries
├── /boot                   Boot files
└── /opt                    Third-party software
```

**Key Characteristics:**

1. **Single root** (/) at top
2. **Hierarchical tree structure**
3. **Absolute paths** start with /
4. **Everything is a file** (directories, devices, etc.)
5. **Standard locations** for different types of files

---

## **Question C2 (7 + 8)**

### **Part (a): Explain important Unix file management commands with suitable examples (7 marks)**

**Answer:**

**File management** involves creating, copying, moving, and deleting files. Here are important commands:

### **1. mkdir - Create Directory**

**Purpose:** Create new directory

**Syntax:**
```bash
mkdir directoryname
mkdir -p dir1/dir2/dir3     # Create nested directories
```

**Examples:**
```bash
mkdir myproject             # Create single directory
mkdir -p project/src/main   # Create nested directories
```

---

### **2. cp - Copy Files/Directories**

**Purpose:** Copy files from source to destination

**Syntax:**
```bash
cp source.txt destination.txt
cp -r sourcedir destdir     # Copy directory recursively
cp -i file.txt backup.txt   # Ask before overwriting
```

**Examples:**
```bash
cp important.txt backup.txt         # Copy file
cp -r /home/docs /backup/docs       # Copy directory
cp file1.txt file2.txt file3.txt /backup/  # Copy multiple
```

---

### **3. mv - Move/Rename Files**

**Purpose:** Move file to new location or rename

**Syntax:**
```bash
mv oldname.txt newname.txt          # Rename
mv file.txt /path/to/directory      # Move to directory
```

**Examples:**
```bash
mv report.txt final_report.txt      # Rename
mv myfile.txt /home/backup/         # Move to directory
mv -i file.txt newname.txt          # Ask before overwriting
```

---

### **4. rm - Delete Files/Directories**

**Purpose:** Delete files or directories

**Syntax:**
```bash
rm filename.txt              # Delete file
rm -r directoryname         # Delete directory and contents
rm -i filename.txt          # Ask before deleting (safe)
```

**Examples:**
```bash
rm oldfile.txt              # Delete single file
rm -r temp_folder           # Delete directory
rm file1.txt file2.txt      # Delete multiple files
rm *.tmp                    # Delete all .tmp files
```

⚠️ **Warning:** `rm` is permanent! No recycle bin!

---

### **5. ls - List Files and Directories**

**Purpose:** Display file and directory information

**Syntax:**
```bash
ls                          # List files
ls -l                       # Long format (detailed)
ls -la                      # All files including hidden
ls -lh                      # Human-readable sizes
ls -R                       # Recursive (subdirectories)
```

**Examples:**
```bash
ls                          # Files in current directory
ls -la /home                # All files in /home
ls -lh                      # With sizes (KB, MB, GB)
ls -lt                      # Sorted by modification time
ls -1                       # One file per line
```

**Output Explanation:**
```
-rw-r--r-- 1 john users 1024 Mar 15 10:30 file.txt
│││││││││  │ │   │     │    │   │   │      │
permissions hl owner group size date time   filename
```

---

### **6. find - Search for Files**

**Purpose:** Find files based on criteria

**Syntax:**
```bash
find [path] [criteria]
```

**Examples:**
```bash
find ~ -name "*.txt"                # Find all .txt files
find / -size +10M                   # Files larger than 10MB
find ~ -type d                      # Find all directories
find ~ -mtime -7                    # Modified in last 7 days
find ~ -name "*.log" -delete        # Find and delete
find . -name "report*" -type f      # Find files starting with "report"
find / -user john -type f           # Files owned by john
```

---

### **Practical Example:**

```bash
#!/bin/bash

# Create project structure
mkdir -p myproject/src
mkdir -p myproject/data
mkdir -p myproject/backup

# Create files
touch myproject/src/main.c
touch myproject/data/input.txt

# Copy important files to backup
cp myproject/src/main.c myproject/backup/
cp myproject/data/input.txt myproject/backup/

# List backup directory
ls -la myproject/backup/

# Find all files in project
find myproject -type f

# Delete temporary files
rm -f myproject/*.tmp
```

---

### **Part (b): Explain file permissions in Unix. Discuss chmod command with symbolic and numeric methods (8 marks)**

**Answer:**

**File Permissions** control who can **read (r)**, **write (w)**, and **execute (x)** files.

### **Permission Structure:**

```
-rw-r--r-- 1 john users 1024 file.txt

First char: - (regular file, d for directory, l for link)

Next 9 chars: rw-r--r--
             │││││││││
             Owner Group Others
             rw- r-- r--

Owner (john): r w - (read, write, no execute)
Group (users): r - - (read only)
Others: r - - (read only)
```

---

### **Permission Values:**

| Symbol | Value | Meaning |
|--------|-------|---------|
| r (read) | 4 | Can read file/list directory |
| w (write) | 2 | Can modify/delete file |
| x (execute) | 1 | Can run file as program/enter directory |

---

### **Method 1: Symbolic Method**

**Syntax:**
```bash
chmod [who][operator][permissions] filename
```

**Who:**
- `u` = user (owner)
- `g` = group
- `o` = others
- `a` = all

**Operator:**
- `+` = add permission
- `-` = remove permission
- `=` = set exactly

**Permissions:**
- `r` = read
- `w` = write
- `x` = execute

**Examples:**

```bash
chmod u+x script.sh         # Owner: add execute
chmod g-w file.txt          # Group: remove write
chmod o=r file.txt          # Others: read only
chmod a+r document.pdf      # All: add read
chmod u+rwx,g+rx file       # Multiple changes
chmod a-x oldscript.sh      # Remove execute from all
```

---

### **Method 2: Numeric Method**

**Syntax:**
```bash
chmod [permission] filename
```

**How it works:**
```
r w x = 4 2 1

rwx = 4+2+1 = 7 (read, write, execute)
rw- = 4+2+0 = 6 (read, write)
r-x = 4+0+1 = 5 (read, execute)
r-- = 4+0+0 = 4 (read only)
-wx = 0+2+1 = 3 (write, execute)
-w- = 0+2+0 = 2 (write only)
--x = 0+0+1 = 1 (execute only)
--- = 0+0+0 = 0 (no permissions)
```

**Three digit number:**
```
chmod 755 file.txt
       │││
       Owner: 7 (rwx = 4+2+1)
       Group: 5 (r-x = 4+0+1)
       Others: 5 (r-x = 4+0+1)
```

---

### **Common Permission Examples:**

| chmod | Meaning |
|-------|---------|
| `chmod 755` | Owner: rwx, Group: r-x, Others: r-x (for scripts) |
| `chmod 644` | Owner: rw-, Group: r--, Others: r-- (for documents) |
| `chmod 777` | Everyone: rwx (dangerous!) |
| `chmod 700` | Owner: rwx, Group: ---, Others: --- (very private) |
| `chmod 600` | Owner: rw-, Group: ---, Others: --- (files only) |

---

### **Practical Examples:**

```bash
# Make script executable
chmod 755 script.sh
chmod u+x script.sh

# Protect document
chmod 600 secret.txt
chmod u=rw secret.txt

# Allow group to read
chmod 640 data.txt
chmod u=rw,g=r data.txt

# Remove all permissions
chmod 000 locked.txt
chmod a-rwx locked.txt

# Add write for group
chmod g+w file.txt
```

---

### **Viewing Permissions:**

```bash
ls -l
[Shows permissions in first 10 characters]

stat filename
[Shows detailed permission information]
```

---

## **Question C3 (5 + 5 + 5)**

### **Part (a): Explain the VI Editor and its different modes (5 marks)**

**Answer:**

**VI** (Visual Editor) is a **text editor** built into Unix/Linux systems. It has **three main modes**:

### **1. Command Mode (Default)**

**When:** VI starts in this mode
**Purpose:** Execute editing commands

**Navigation:**
```
h    ← left
j    ↓ down
k    ↑ up
l    → right
```

**Editing Commands:**
```bash
dd          Delete current line
yy          Copy current line
p           Paste after cursor
u           Undo
5dd         Delete 5 lines
:10         Go to line 10
w           Next word
b           Previous word
G           End of file
```

**Searching:**
```bash
/word       Search forward
?word       Search backward
n           Next match
N           Previous match
```

---

### **2. Insert Mode**

**When:** Press `i`, `a`, `o` from Command Mode
**Purpose:** Type and edit text

**How to enter:**

| Key | Action |
|-----|--------|
| `i` | Insert before cursor |
| `a` | Append after cursor |
| `I` | Insert at line beginning |
| `A` | Append at line end |
| `o` | Open new line below |
| `O` | Open new line above |

**Example:**
```bash
[Command Mode]
i              → Enter Insert Mode
Type text here
Esc            → Return to Command Mode
```

---

### **3. Last-line Mode (Ex Mode)**

**When:** Press `:` from Command Mode
**Purpose:** Execute advanced operations

**Common Commands:**

| Command | Function |
|---------|----------|
| `:w` | Save file |
| `:q` | Quit |
| `:wq` | Save and quit |
| `:q!` | Quit without saving |
| `:e filename` | Open file |
| `:set nu` | Show line numbers |

**Find and Replace:**
```bash
:s/old/new/         Replace first in line
:s/old/new/g        Replace all in line
:%s/old/new/g       Replace all in file
:1,10s/old/new/g    Replace in lines 1-10
```

---

### **Quick Reference Table:**

| Task | Command |
|------|---------|
| Enter Insert | `i` |
| Exit to Command | `Esc` |
| Delete line | `dd` |
| Copy line | `yy` |
| Paste | `p` |
| Undo | `u` |
| Save | `:w` |
| Quit | `:q` |
| Save + Quit | `:wq` |

---

### **Part (b): Explain file editing commands used in VI Editor (5 marks)**

**Answer:**

**File editing commands** allow you to modify file content in VI. All these commands execute in **Command Mode**.

### **1. Deletion Commands**

```bash
x       Delete character under cursor
dw      Delete word
dd      Delete entire line
d$      Delete to end of line
d0      Delete to beginning of line
5dd     Delete 5 lines
dG      Delete to end of file
d1G     Delete to beginning of file
```

**Examples:**
```bash
[Position cursor on a character]
x       → Deletes that character

[Position cursor on first letter of word]
dw      → Deletes the word

[Any position in line]
dd      → Deletes entire line
```

---

### **2. Copy/Paste Commands**

```bash
yy      Copy current line
5yy     Copy 5 lines
yw      Copy word
y$      Copy to end of line
p       Paste after cursor
P       Paste before cursor
```

**Example:**
```bash
[Position at line to copy]
yy      → Copy line
[Position where you want to paste]
p       → Paste after
P       → Paste before
```

---

### **3. Replace Commands**

```bash
r       Replace single character
R       Replace multiple characters (enter replace mode)
cw      Change word
cc      Change entire line
c$      Change to end of line
```

**Example:**
```bash
[Position on character]
r a     → Replace with 'a'

[Position on word]
cw new_word → Replace word with "new_word"
```

---

### **4. Movement Commands**

```bash
h, j, k, l      Move left, down, up, right
w               Next word
b               Previous word
$               End of line
0               Beginning of line
G               End of file
1G              Beginning of file
10G             Line 10
^               First non-blank character
```

---

### **5. Insertion Commands**

```bash
i       Insert before cursor
a       Append after cursor
I       Insert at beginning of line
A       Append at end of line
o       Open new line below
O       Open new line above
```

---

### **6. Undo/Redo**

```bash
u       Undo last change
U       Undo all changes in line
Ctrl+r  Redo
```

---

### **Practical Editing Example:**

```bash
Original text:
Line 1: The quick brown fox jumps
Line 2: over the lazy dog

Editing commands:

1G              Go to line 1
w               Move to "quick"
cw fast         Replace "quick" with "fast"

Result:
Line 1: The fast brown fox jumps
Line 2: over the lazy dog
```

---

### **Part (c): Explain Search & Replace operations in VI Editor with examples (5 marks)**

**Answer:**

**Search and Replace** are powerful features for finding and modifying text.

### **1. Search Operations**

#### **Search Forward:**
```bash
/pattern        Find "pattern" from current position forward
n               Go to next match
N               Go to previous match
```

#### **Search Backward:**
```bash
?pattern        Find "pattern" backward
n               Go to next match (backward)
N               Go to previous match (forward)
```

**Example:**
```bash
/error          Search for "error"
n               Go to next "error"
?error          Search backward for "error"
```

---

### **2. Replace Operations**

#### **Replace in Current Line:**
```bash
:s/old/new/     Replace first occurrence
:s/old/new/g    Replace all in line
```

#### **Replace in Range:**
```bash
:1,5s/old/new/g         Replace in lines 1-5
:10,20s/old/new/g       Replace in lines 10-20
```

#### **Replace Entire File:**
```bash
:%s/old/new/g           Replace all occurrences in file
:%s/old/new/            Replace first in each line
```

#### **Replace with Confirmation:**
```bash
:%s/old/new/gc          Replace with confirmation for each
```

**Example:**
```bash
File content:
John Smith
John Brown
John Green

:%s/John/Mr. John/g

Result:
Mr. John Smith
Mr. John Brown
Mr. John Green
```

---

### **3. Special Characters in Search/Replace**

```bash
.       Any character
*       Zero or more of previous
^       Start of line
$       End of line
\<      Start of word
\>      End of word
```

**Examples:**

```bash
/^ERROR             Find lines starting with "ERROR"
/error$/            Find lines ending with "error"
:%s/^/> /g          Add ">" at beginning of each line
:%s/ /_/g           Replace spaces with underscores
```

---

### **4. Practical Examples**

**Example 1: Fix common misspelling**
```bash
File:
The database is corect
This is a corect approch

Command:
:%s/corect/correct/g

Result:
The database is correct
This is a correct approch
```

**Example 2: Add comment to lines**
```bash
Command:
:%s/^/# /

Result: (Adds # at beginning of each line)
# Line 1
# Line 2
# Line 3
```

**Example 3: Remove trailing spaces**
```bash
Command:
:%s/ *$//g

Result: (Removes spaces at line endings)
```

**Example 4: Replace with multiple occurrences**
```bash
File:
name=john
age=25
name=sarah

Command:
:%s/name/NAME/g

Result:
NAME=john
age=25
NAME=sarah
```

---

### **Quick Search/Replace Reference:**

| Operation | Command |
|-----------|---------|
| Find forward | `/pattern` |
| Find backward | `?pattern` |
| Next match | `n` |
| Previous match | `N` |
| Replace first in line | `:s/old/new/` |
| Replace all in line | `:s/old/new/g` |
| Replace in file | `:%s/old/new/g` |
| Replace with confirm | `:%s/old/new/gc` |

---

## **Question C4 (3 + 3 + 4 + 5)**

### **Part (a): What is grep? (3 marks)**

**Answer:**

**grep** stands for **Global Regular Expression Print**.

**Definition:** grep is a command-line tool used to **search for lines matching a specific pattern** in one or more files.

**Key Features:**
1. **Searches text patterns** - Can find exact text or patterns
2. **Displays matching lines** - Shows entire lines that match
3. **Supports regular expressions** - Powerful pattern matching
4. **Case-sensitive by default** - Can be made case-insensitive with -i flag
5. **Works with pipes** - Can be used in command pipelines

**Basic Syntax:**
```bash
grep [options] "pattern" filename
```

**Example:**
```bash
grep "error" system.log
[Shows all lines containing "error"]

grep -i "ERROR" system.log
[Shows all lines with "error" (case-insensitive)]
```

---

### **Part (b): Explain the awk command (3 marks)**

**Answer:**

**awk** is a **powerful text processing language** that operates on structured text files line by line.

**Key Features:**
1. **Line-by-line processing** - Processes files one line at a time
2. **Field-based** - Can extract and manipulate columns
3. **Pattern matching** - Find lines matching patterns
4. **Calculations** - Can do math on fields
5. **Formatting** - Can format output

**Basic Syntax:**
```bash
awk 'pattern { action }' filename
awk -F: '{print $1}' file.txt    # Custom field separator
```

**Field Variables:**
```bash
$0 = Entire line
$1 = First field
$2 = Second field
$NF = Last field
NR = Record number (line number)
```

**Example:**
```bash
# Extract first column
awk '{print $1}' file.txt

# Print lines with value > 80
awk '$3 > 80 {print $1, $3}' marks.txt

# Calculate sum
awk '{sum += $3} END {print sum}' marks.txt
```

---

### **Part (c): Explain sort, uniq, and join commands (4 marks)**

**Answer:**

#### **1. sort - Arrange Lines in Order**

**Purpose:** Sort lines alphabetically or numerically

**Syntax:**
```bash
sort [options] filename
```

**Common Options:**
```bash
-n          Numeric sort
-r          Reverse order
-t:         Field separator
-k2         Sort by field 2
-u          Remove duplicates while sorting
```

**Examples:**
```bash
sort names.txt                  # Alphabetical
sort -n numbers.txt            # Numeric
sort -r names.txt              # Reverse
sort -t: -k2 data.txt          # By field 2, delimiter :
sort -t: -k2 -rn data.txt      # Numeric, reverse
```

---

#### **2. uniq - Remove Duplicate Lines**

**Purpose:** Remove or find duplicate lines (must be sorted first!)

**Syntax:**
```bash
uniq [options] filename
```

**Common Options:**
```bash
-c          Count occurrences
-d          Show only duplicates
-u          Show only unique
```

**Examples:**
```bash
sort data.txt | uniq            # Remove duplicates
sort data.txt | uniq -c         # Count each item
sort data.txt | uniq -d         # Show duplicates only
sort data.txt | uniq -u         # Show unique items
```

**Important:** Always use `sort` before `uniq`!

---

#### **3. join - Combine Files on Common Field**

**Purpose:** Join two sorted files on a common field

**Syntax:**
```bash
join [options] file1 file2
```

**Common Options:**
```bash
-1 field        Field in file1 to match
-2 field        Field in file2 to match
-t delimiter    Field separator
```

**Example:**
```bash
# File1: ids.txt
1 john
2 sarah
3 mike

# File2: ages.txt
1 25
2 30
3 28

Command:
join ids.txt ages.txt

Output:
1 john 25
2 sarah 30
3 mike 28
```

---

### **Part (d): Explain searching and text-processing commands with suitable examples (5 marks)**

**Answer:**

**Text processing commands** are used to search, filter, and transform text data.

### **1. grep - Search for Patterns**

**Most Commonly Used Options:**

```bash
grep "error" file.txt           # Find lines with "error"
grep -i "ERROR" file.txt        # Case-insensitive
grep -n "error" file.txt        # Show line numbers
grep -c "error" file.txt        # Count matches
grep -v "error" file.txt        # Exclude lines with "error"
grep -r "error" /path           # Recursive search
grep "^error" file.txt          # Start of line
grep "error$" file.txt          # End of line
```

---

### **2. sed - Stream Editor**

**Purpose:** Find and replace, delete lines, etc.

```bash
sed 's/old/new/' file.txt       # Replace first occurrence
sed 's/old/new/g' file.txt      # Replace all
sed '3d' file.txt               # Delete line 3
sed -n '2,4p' file.txt          # Print lines 2-4
```

---

### **3. awk - Text Processing**

**Purpose:** Process structured data

```bash
awk '{print $1}' file.txt                      # Print field 1
awk -F: '{print $1}' /etc/passwd              # Custom separator
awk '$3 > 80 {print $1, $3}' marks.txt       # Filter and extract
awk '{sum += $3} END {print sum}' file.txt   # Calculate sum
```

---

### **4. cut - Extract Columns**

**Purpose:** Extract specific columns

```bash
cut -d: -f1 /etc/passwd         # Field 1, delimiter :
cut -d, -f1,3 data.csv          # Fields 1 and 3
cut -c1-5 file.txt              # Characters 1-5
```

---

### **5. tr - Transform Characters**

**Purpose:** Replace or delete characters

```bash
tr 'a-z' 'A-Z' < file.txt       # Lowercase to uppercase
tr -d ' ' < file.txt             # Delete spaces
tr -s ' ' < file.txt             # Squeeze spaces
```

---

### **Practical Example: Processing a Log File**

```bash
File: access.log
192.168.1.1 GET /index.html 200
192.168.1.2 GET /admin 401
192.168.1.3 POST /api 500
192.168.1.1 GET /image.jpg 404

# Find all GET requests
grep " GET " access.log

# Count 404 errors
grep -c " 404" access.log

# Find IP addresses with errors
grep -v " 200" access.log | cut -d' ' -f1

# Sort by IP and count requests
cut -d' ' -f1 access.log | sort | uniq -c

# Find IPs with more than 2 requests
cut -d' ' -f1 access.log | sort | uniq -c | awk '$1 > 2'
```

---

## **Question C5 (7 + 8)**

### **Part (a): Explain Process Management in Unix (7 marks)**

**Answer:**

**Process Management** is how Unix controls and manages running programs.

### **1. What is a Process?**

A **process** is a **running program in memory** with:
- Unique Process ID (PID)
- Its own memory space
- A parent process (PPID)
- Current state (running, sleeping, stopped)

**Process vs Program:**
```
Program = Code on disk (static)
Process = Program in memory (executing)
```

---

### **2. Process Creation - fork()**

**fork()** creates a **child process** that is a copy of parent.

**How it works:**
```bash
Parent Process 1000
    │
    ├─ fork()
    │
    ├─→ Child Process 1001 (copy)
    │
    └─→ Continues...
```

**In shell:**
```bash
./long_running_process &
[Creates child process, parent continues]
```

---

### **3. Getting Process ID - getpid() and getppid()**

**getpid()** returns current process ID
**getppid()** returns parent process ID

**Example:**
```bash
echo $$              # Current shell's PID
echo $PPID           # Parent PID

ps                   # Shows PID and PPID
PID   PPID   CMD
100   1      bash
200   100    ls
```

---

### **4. Process States**

Processes can be in different states:

```
Running (R)     = Currently executing on CPU
Sleeping (S)    = Waiting for something (I/O, event)
Stopped (T)     = Paused (Ctrl+Z)
Zombie (Z)      = Dead but not cleaned up
Dead            = Exited and cleaned
```

**State Transitions:**
```
Running ←→ Sleeping ← Stopped
   ↓
Zombie → Dead
```

---

### **5. Waiting for Process - wait()**

**wait()** makes parent process **wait for child to finish**.

**Without wait (problem):**
```bash
#!/bin/bash
./backup.sh &
./cleanup.sh &
# Both run simultaneously, might cause issues
```

**With wait (correct):**
```bash
#!/bin/bash
./backup.sh
wait            # Wait for backup to finish
./cleanup.sh    # Then run cleanup
wait            # Wait for cleanup
echo "All done!"
```

---

### **6. Zombie Processes**

**What is a Zombie?**

A process that has finished but parent hasn't collected its exit status.

```
Parent creates Child
    │
    └─→ Child runs and finishes
        │
        └─→ Becomes Zombie (waiting for parent to call wait())
            │
            └─→ Parent calls wait() → Zombie cleaned up
```

**Problem:** Zombies waste process table entries

**Solution:** Parent must call wait()

**Detecting Zombies:**
```bash
ps aux | grep Z
[Shows <defunct> processes]
```

---

### **7. Process Viewing Commands**

**ps - Process Status**
```bash
ps              # Current processes
ps aux          # All processes detailed
ps -ef          # Extended format
ps -u username  # User's processes
```

**Output:**
```
USER PID PPID %CPU %MEM CMD
john 100 1    2.5  10.5 firefox
```

**top - Real-time Monitor**
```bash
top
[Shows processes sorted by CPU usage]
[Interactive: Press 'q' to quit, 'P' for CPU, 'M' for memory]
```

---

### **Part (b): Explain Shell Programming. Write a shell script using if-else, for loop, and while loop with suitable examples (8 marks)**

**Answer:**

**Shell Programming** is writing scripts (sequences of commands) to automate tasks.

---

### **1. Shell Script Basics**

**What is Shell Script?**
- Text file with sequence of Unix commands
- Executed by shell interpreter (bash, sh)
- Can include variables, loops, conditionals
- File extension: `.sh`

**Creating Script:**
```bash
#!/bin/bash         # Shebang - tells system to use bash
# This is a comment
echo "Hello World"  # Command
```

**Running Script:**
```bash
chmod +x script.sh  # Make executable
./script.sh         # Run script
```

---

### **2. Variables**

```bash
#!/bin/bash

# Creating variables
name="John"
age=25
city="New York"

# Using variables
echo "Name: $name"
echo "Age: $age"
echo "City: $city"

# Command substitution
current_date=$(date)
echo "Today: $current_date"

# Arguments
echo "First argument: $1"
echo "All arguments: $@"
echo "Number of arguments: $#"
```

---

### **3. if-else Conditional**

**Syntax:**
```bash
if [ condition ]
then
    commands
elif [ condition ]
then
    commands
else
    commands
fi
```

**Example 1: Simple if-else**
```bash
#!/bin/bash

age=$1

if [ $age -ge 18 ]
then
    echo "You are an adult"
else
    echo "You are a minor"
fi
```

**Example 2: Multiple conditions**
```bash
#!/bin/bash

score=$1

if [ $score -ge 90 ]
then
    echo "Grade: A"
elif [ $score -ge 80 ]
then
    echo "Grade: B"
elif [ $score -ge 70 ]
then
    echo "Grade: C"
else
    echo "Grade: F"
fi
```

**Example 3: File checking**
```bash
#!/bin/bash

filename=$1

if [ -f "$filename" ]
then
    echo "File exists"
    echo "Size: $(wc -c < $filename) bytes"
else
    echo "File does not exist"
fi
```

---

### **4. for Loop**

**Syntax:**
```bash
for variable in list
do
    commands
done
```

**Example 1: Loop through list**
```bash
#!/bin/bash

for fruit in apple banana cherry
do
    echo "Fruit: $fruit"
done

# Output:
# Fruit: apple
# Fruit: banana
# Fruit: cherry
```

**Example 2: Loop through numbers**
```bash
#!/bin/bash

for i in {1..5}
do
    echo "Number: $i"
done

# Output: Number: 1, 2, 3, 4, 5
```

**Example 3: Loop through files**
```bash
#!/bin/bash

for file in *.txt
do
    echo "Processing: $file"
    wc -l "$file"
done
```

**Example 4: C-style for loop**
```bash
#!/bin/bash

for ((i=1; i<=5; i++))
do
    echo "Count: $i"
done
```

---

### **5. while Loop**

**Syntax:**
```bash
while [ condition ]
do
    commands
done
```

**Example 1: Counter loop**
```bash
#!/bin/bash

count=1
while [ $count -le 5 ]
do
    echo "Count: $count"
    count=$((count + 1))
done

# Output: Count: 1, 2, 3, 4, 5
```

**Example 2: Menu loop**
```bash
#!/bin/bash

choice=0
while [ $choice -ne 3 ]
do
    echo "1. Add"
    echo "2. Remove"
    echo "3. Exit"
    read choice
    
    case $choice in
        1) echo "Adding..." ;;
        2) echo "Removing..." ;;
        3) echo "Goodbye!" ;;
    esac
done
```

**Example 3: Read file**
```bash
#!/bin/bash

while IFS= read -r line
do
    echo "Line: $line"
done < myfile.txt
```

---

### **6. Complete Practical Script**

```bash
#!/bin/bash

# Script: Backup system
# Usage: ./backup.sh <source_dir>

source_dir="$1"
backup_dir="/backup"
backup_file="$backup_dir/backup_$(date +%Y%m%d).tar.gz"

# Check if source directory exists
if [ ! -d "$source_dir" ]
then
    echo "Error: Source directory not found!"
    exit 1
fi

# Create backup directory if not exists
if [ ! -d "$backup_dir" ]
then
    mkdir -p "$backup_dir"
fi

# Backup files
echo "Starting backup..."
tar -czf "$backup_file" "$source_dir"

if [ $? -eq 0 ]
then
    echo "Backup successful: $backup_file"
    ls -lh "$backup_file"
else
    echo "Backup failed!"
    exit 1
fi

# Keep only last 5 backups
echo "Cleaning old backups..."
ls -t "$backup_dir"/backup_*.tar.gz | tail -n +6 | while read old_backup
do
    echo "Deleting: $old_backup"
    rm "$old_backup"
done

echo "Done!"
```

**Usage:**
```bash
chmod +x backup.sh
./backup.sh /home/mydata
```

---

# 🎓 FINAL EXAM TIPS

## **Before Exam**
1. **Sleep well** - 8 hours minimum
2. **Eat properly** - Brain needs fuel
3. **Review** - Quick look at formulas/diagrams
4. **Be on time** - No rushing

## **During Exam**
1. **Read all questions** - 5 minutes
2. **Allocate time:**
   - Section A: 12 minutes (1 min each)
   - Section B: 35 minutes (5-7 min each)
   - Section C: 45 minutes (9-10 min each)
3. **Start with easier questions** - Build confidence
4. **Attempt all questions** - Some marks for attempt
5. **Use diagrams** - Show understanding
6. **Define terms** - Show technical knowledge
7. **Provide examples** - They add credibility

## **For Specific Question Types**

### **One-Mark Questions**
- ✅ Give concise definition
- ✅ Use technical terms correctly
- ✅ Don't write extra (wastes time)

### **Short Answer (5 marks)**
- ✅ Give definition + explanation
- ✅ Provide 1-2 examples
- ✅ Use diagrams if helpful
- ✅ Keep concise (½ page)

### **Long Answer (15 marks)**
- ✅ Answer ALL parts
- ✅ Provide detailed explanation
- ✅ Draw neat diagrams
- ✅ Give multiple examples
- ✅ Show step-by-step logic
- ✅ Use proper code formatting

## **Common Mistakes to Avoid**
- ❌ Leaving questions blank
- ❌ Writing irrelevant information
- ❌ Poor handwriting
- ❌ Incomplete diagrams
- ❌ Wrong technical terms
- ❌ Not following question instructions

## **Marking Scheme Insights**

**Examiners look for:**
1. **Correct definition** (50% of marks)
2. **Clear explanation** (30% of marks)
3. **Relevant examples** (20% of marks)

**To maximize marks:**
- Define clearly
- Explain thoroughly
- Provide examples

---

# 🎉 CONCLUSION

You now have **complete, model answers** for all exam questions. These answers are designed to:
- ✅ Score maximum marks
- ✅ Show deep understanding
- ✅ Include all required details
- ✅ Use proper formatting
- ✅ Demonstrate technical knowledge

**Success Formula:**
```
Understanding + Clarity + Diagrams + Examples = Full Marks!
```

**Good luck! You can ace this exam! 💯**

---

**Remember:** Quality over quantity. Better to write fewer points clearly than many confusing points.


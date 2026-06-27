# 📚 COMPLETE LINUX SYLLABUS - DETAILED LEARNING GUIDE
## Step-by-Step Tutorials for All Modules

---

# 🟢 MODULE 1: INTRODUCTION TO UNIX (2 hours | 5 marks)

## What is UNIX and Linux?

### **Historical Context**
- **UNIX** was created in 1969 at Bell Labs
- **Linux** was created in 1991 by Linus Torvalds as a free, open-source operating system
- Linux follows UNIX principles but is a separate operating system

### **Key Differences: UNIX vs Linux**

| Feature | UNIX | Linux |
|---------|------|-------|
| Cost | Expensive, proprietary | Free and open-source |
| Source Code | Closed | Open (anyone can view) |
| Operating Systems | Solaris, AIX, HP-UX | Ubuntu, CentOS, Fedora |
| User Base | Large enterprises | Individuals, startups, enterprises |
| Kernel | Various | Single Linux kernel |

---

## 1.1 POSIX (Portable Operating System Interface)

### **What is POSIX?**
- A standard that defines how Unix-like systems should work
- Ensures compatibility between different Unix systems
- Think of it like a "recipe" that all Unix systems follow

### **Real Example:**
If you write a program on Linux following POSIX standards, it should run on:
- Ubuntu (Linux)
- macOS (Unix-based)
- Solaris (Unix)

Without POSIX: Each system would need a different program.
With POSIX: One program works on all POSIX-compliant systems.

---

## 1.2 Linux Distributions

### **What is a Distribution (Distro)?**
A distribution is Linux kernel + GNU utilities + package manager + desktop environment.

### **Popular Distributions:**

**1. Ubuntu**
- Most beginner-friendly
- Based on Debian
- Used by: Students, startups
- Example: `apt-get install firefox`

**2. CentOS**
- Enterprise-focused
- Based on Red Hat
- Used by: Large companies, servers
- Example: `yum install nginx`

**3. Fedora**
- Cutting-edge features
- Testing ground for Red Hat
- Used by: Developers
- Example: Bleeding-edge software

**4. Red Hat Enterprise Linux (RHEL)**
- Professional support available
- Used by: Fortune 500 companies
- Cost: Paid, but includes support

### **Why Different Distros?**
- **Server use**: CentOS, RHEL (stability)
- **Desktop use**: Ubuntu, Fedora (user-friendly)
- **Embedded systems**: Alpine Linux (lightweight)
- **Advanced users**: Arch Linux (customizable)

---

## 1.3 Unix System Architecture

### **Layered Architecture Diagram**

```
┌─────────────────────────────┐
│   Applications (Firefox,    │
│   VSCode, GIMP, Python)     │
├─────────────────────────────┤
│   Shell & Utilities         │
│   (bash, grep, sed, awk)    │
├─────────────────────────────┤
│   System Calls Interface    │
│   (read, write, open, etc)  │
├─────────────────────────────┤
│   Kernel                    │
│   (Process mgmt, Memory,    │
│    File system, Drivers)    │
├─────────────────────────────┤
│   Hardware                  │
│   (CPU, RAM, Disk, NIC)     │
└─────────────────────────────┘
```

### **Breaking Down Each Layer:**

**Layer 1: Applications**
- Programs you use: Firefox, VS Code, Spotify, etc.
- Written in: C, Python, Java, JavaScript, etc.

**Layer 2: Shell & Utilities**
- Command-line interface (bash, sh, zsh)
- Programs like: grep, sed, awk, find
- These interpret your commands

**Layer 3: System Calls Interface**
- Bridge between applications and kernel
- Examples: `read()`, `write()`, `open()`, `close()`
- When you type in terminal, it calls these functions

**Layer 4: Kernel**
- Core of the operating system
- Manages: Processes, memory, file system, hardware
- Controls everything running on the computer

**Layer 5: Hardware**
- Physical components: CPU, RAM, Hard Disk, Network Card
- Kernel communicates with these

---

## 1.4 System Calls (How Programs Talk to Kernel)

### **What is a System Call?**
A system call is a request from a program to the kernel to do something privileged.

### **Why System Calls?**
```
Problem: Programs should NOT directly access hardware
         (could cause crashes)
Solution: Use system calls to ask kernel to do it safely
```

### **Common System Calls:**

1. **File Operations**
   ```
   open()      - Open a file
   read()      - Read from file
   write()     - Write to file
   close()     - Close file
   ```

2. **Process Operations**
   ```
   fork()      - Create new process
   exec()      - Execute a program
   wait()      - Wait for process to finish
   exit()      - Terminate process
   ```

3. **Memory Operations**
   ```
   malloc()    - Allocate memory
   free()      - Release memory
   ```

### **Example: Opening a File**

**Without system call (DANGEROUS):**
```
Application tries to directly access hard disk
└─ Hard disk doesn't respond to applications
└─ Program crashes
```

**With system call (SAFE):**
```
Application calls: open("/home/user/file.txt", READ)
└─ Kernel receives request
└─ Kernel checks: Do you have permission?
└─ Kernel safely reads from disk
└─ Returns data to application
```

---

## 1.5 Unix Directory Structure (File System Organization)

### **Think of it like a folder hierarchy on your computer**

```
/                           (Root directory)
├── /bin                    (Essential programs)
│   ├── ls                  (list files)
│   ├── cat                 (display files)
│   ├── bash                (shell)
│   └── grep                (search)
│
├── /etc                    (Configuration files)
│   ├── passwd              (user information)
│   ├── hostname            (computer name)
│   └── fstab               (disk mounting)
│
├── /usr                    (User programs & data)
│   ├── /usr/bin            (more programs)
│   ├── /usr/lib            (libraries)
│   └── /usr/share          (shared data)
│
├── /home                   (User home directories)
│   ├── /home/john          (John's files)
│   ├── /home/sarah         (Sarah's files)
│   └── /home/user          (Your files)
│
├── /var                    (Variable data)
│   ├── /var/log            (log files)
│   └── /var/tmp            (temporary files)
│
├── /tmp                    (Temporary files)
│
├── /root                   (Root user's home)
│
├── /lib                    (System libraries)
│
├── /dev                    (Device files)
│   ├── /dev/sda            (hard disk)
│   ├── /dev/tty            (terminal)
│   └── /dev/null           (null device)
│
└── /boot                   (Boot files)
    └── kernel              (Linux kernel)
```

### **Important Directories Explained:**

| Directory | Purpose | Example Content |
|-----------|---------|-----------------|
| `/bin` | Essential commands everyone needs | ls, cat, bash, grep |
| `/etc` | System configuration | Network settings, user info |
| `/home` | Where users store their files | Documents, Downloads, Desktop |
| `/var/log` | System logs (error messages) | apache2, syslog |
| `/tmp` | Temporary files (deleted on reboot) | Temporary data |
| `/root` | Admin (root) user's home folder | Root's personal files |
| `/usr/bin` | Additional programs | python, node, npm |
| `/lib` | System libraries (code libraries) | Dependencies for programs |

### **Understanding Paths:**

**Absolute Path** (starts from root `/`):
```
/home/user/Documents/resume.pdf
- Always starts with /
- Works from anywhere in system
```

**Relative Path** (relative to current location):
```
If you're in /home/user/Documents:
resume.pdf          (same directory)
../Downloads/file   (one level up, then Downloads)
```

---

## 1.6 Linux Kernel - The Heart of the System

### **What Does the Kernel Do?**

**1. Process Management**
- Controls which program runs when
- Allocates CPU time
- Handles multitasking (running multiple programs simultaneously)

**2. Memory Management**
- Allocates RAM to programs
- Protects memory (one program can't crash another)
- Virtual memory (uses hard disk when RAM is full)

**3. File System Management**
- Organizes files on hard disk
- Handles read/write operations
- Manages permissions

**4. Device Management**
- Controls printers, keyboards, monitors, network
- Acts as intermediary between hardware and programs

**5. Security**
- User authentication (who are you?)
- File permissions (who can access what?)
- Prevents unauthorized access

---

## 1.7 Boot Process (How Linux Starts)

### **When you power on your computer:**

```
Step 1: BIOS/UEFI
├─ Hardware self-test
└─ Finds bootloader

Step 2: Bootloader (GRUB)
├─ Loads kernel into memory
└─ Hands control to kernel

Step 3: Kernel Initialization
├─ Initializes drivers
├─ Mounts file system
├─ Starts first process (init/systemd)
└─ Starts essential services

Step 4: Init System (systemd)
├─ Starts network services
├─ Starts user services
└─ Ready for login

Step 5: Login
└─ User logs in (username/password)

Step 6: Shell
└─ Terminal ready for commands
```

---

## 1.8 Users and Permissions - Security Basics

### **User Types:**

**1. Root User**
- Username: `root`
- Has complete control (UID = 0)
- Can do anything (dangerous!)

**2. Regular Users**
- Username: john, sarah, etc.
- Limited permissions (UID > 0)
- Can't access other users' files (usually)

**3. System Users**
- Created for services (www-data for Apache, mysql for MySQL)
- No login shell

### **File Permissions:**

```
-rwxr-xr-x  1  john  group  4096  file.txt
```

Breaking it down:
- `-` = regular file (could be `d` for directory)
- `rwx` = owner (john) can: read, write, execute
- `r-x` = group can: read, execute (not write)
- `r-x` = others can: read, execute (not write)

### **Permission Numbers:**

```
r (read)    = 4
w (write)   = 2
x (execute) = 1

rwx = 4+2+1 = 7
r-x = 4+0+1 = 5
r-- = 4+0+0 = 4
```

**Example: `chmod 755 file.txt`**
- Owner: 7 (read, write, execute)
- Group: 5 (read, execute)
- Others: 5 (read, execute)

---

## Summary of Module 1

✅ **You now understand:**
1. What Unix and Linux are
2. POSIX standards ensure compatibility
3. Different Linux distributions for different purposes
4. System architecture (applications → shell → kernel → hardware)
5. How system calls bridge applications and kernel
6. Directory structure and important folders
7. Linux kernel's responsibilities
8. User types and basic permissions

**Next**: Module 2 - Unix File Commands (the practical stuff!)

---

# 🟢 MODULE 2: UNIX FILE COMMANDS (8 hours | 12 marks)

## 2.1 Understanding Files in Unix

### **"Everything is a File" Philosophy**

In Unix, almost everything is treated as a file:

```
Regular files       → myfile.txt, program.py
Directories        → /home/user/Documents
Devices            → /dev/sda (hard disk), /dev/tty (terminal)
Symbolic links     → shortcuts to files
Pipes              → for inter-process communication
Sockets            → for network communication
```

### **File Types and Their Symbols:**

```
- = regular file          (text, images, programs)
d = directory             (folder)
l = symbolic link         (shortcut)
c = character device      (keyboard, terminal)
b = block device          (hard disk, USB)
p = pipe                  (data transfer)
s = socket                (network communication)
```

---

## 2.2 Basic File Operations

### **1. Creating Files**

**Method 1: Using `touch`**
```bash
touch myfile.txt
```
- Creates empty file
- If file exists, updates timestamp
- Useful for: creating blank files quickly

**Method 2: Using `cat > file.txt`**
```bash
cat > myfile.txt
Hello, this is my first file
This is line 2
Ctrl+D (to save and exit)
```
- Creates file with content
- Press Ctrl+D when done

**Method 3: Using text editor**
```bash
nano myfile.txt
# or
vi myfile.txt
```

### **2. Viewing File Content**

**`cat` - Display entire file**
```bash
cat myfile.txt
```
Output:
```
Hello, this is my first file
This is line 2
```

**`head` - Show first 10 lines**
```bash
head myfile.txt
# Or first 5 lines
head -5 myfile.txt
```

**`tail` - Show last 10 lines**
```bash
tail myfile.txt
# Or last 3 lines
tail -3 myfile.txt
```

**`less` - View file page by page (interactive)**
```bash
less largefile.txt
# Press Space to go next page
# Press 'q' to quit
```

---

### **3. Copying Files**

**Basic copy:**
```bash
cp source.txt destination.txt
```

**Copy to directory:**
```bash
cp myfile.txt /home/user/Documents/
```

**Copy multiple files:**
```bash
cp file1.txt file2.txt file3.txt /backup/
```

**Copy recursively (entire directory):**
```bash
cp -r /home/user/Documents /backup/Documents
```

**Options:**
```bash
-i  = interactive (ask before overwriting)
-v  = verbose (show what's being copied)
-r  = recursive (copy directories)
-p  = preserve (keep original permissions)
```

**Example:**
```bash
cp -iv oldname.txt newname.txt
cp: overwrite 'newname.txt'? y
'oldname.txt' -> 'newname.txt'
```

---

### **4. Moving/Renaming Files**

**Move file to another location:**
```bash
mv oldlocation.txt /home/user/Documents/
```

**Rename file:**
```bash
mv oldname.txt newname.txt
```

**Move multiple files:**
```bash
mv file1.txt file2.txt file3.txt /backup/
```

**Options:**
```bash
-i  = ask before overwriting
-v  = show what's being moved
```

### **5. Deleting Files**

**Delete single file:**
```bash
rm myfile.txt
```

**Delete with confirmation:**
```bash
rm -i myfile.txt
rm: remove regular file 'myfile.txt'? y
```

**Delete multiple files:**
```bash
rm file1.txt file2.txt file3.txt
```

**Delete empty directory:**
```bash
rmdir empty_folder/
```

**Delete directory with content:**
```bash
rm -r folder_with_files/
```

⚠️ **WARNING**: `rm` is permanent! No recycle bin! Use `-i` flag to be safe.

---

## 2.3 File Information and Attributes

### **Listing Files - `ls` command**

**Basic listing:**
```bash
ls
output: file1.txt  file2.txt  Documents
```

**Long format (detailed info):**
```bash
ls -l
-rw-r--r-- 1 john users 1024 Mar 15 10:30 file1.txt
drwxr-xr-x 2 john users 4096 Mar 15 10:25 Documents
```

Breaking down the output:
```
-rw-r--r--  = Permissions (owner: read+write, group: read, others: read)
1           = Number of hard links
john        = Owner
users       = Group
1024        = File size in bytes
Mar 15      = Date modified
10:30       = Time modified
file1.txt   = Filename
```

**List all files (including hidden):**
```bash
ls -a
# Shows files starting with dot (.)
# Like: .bashrc, .profile, .hidden_file
```

**Long format with human-readable sizes:**
```bash
ls -lh
-rw-r--r-- 1 john users 1.0K Mar 15 10:30 file1.txt
-rw-r--r-- 1 john users 2.5M Mar 15 10:25 photo.jpg
```

### **File Information - `stat` command**

```bash
stat myfile.txt
```

Output:
```
File: myfile.txt
Size: 1024        (bytes)
Blocks: 8         (512-byte blocks)
IO Block: 4096    (bytes)
Access: (0644/-rw-r--r--)  (permissions)
Uid: (1000/john)  (owner)
Gid: (1000/users) (group)
Access: 2024-03-15 10:30:00.000000000 (last read)
Modify: 2024-03-15 10:30:00.000000000 (last modified)
Change: 2024-03-15 10:30:00.000000000 (status changed)
Birth: -           (not supported on all systems)
```

---

## 2.4 File Permissions and Ownership

### **Understanding Permissions**

```
rwx rwx rwx
│   │   └─ Others (everyone else)
│   └───── Group (users in group)
└───────── Owner (who created it)

r = read   (4)
w = write  (2)
x = execute (1)
```

### **Changing Permissions - `chmod` command**

**Symbolic method:**
```bash
chmod u+x script.sh      # Add execute to user
chmod g-w file.txt       # Remove write from group
chmod o=r document.pdf   # Set others to read-only
chmod a+r file.txt       # Add read to all
```

**Numeric method:**
```bash
chmod 755 script.sh
# Owner: 7 (read+write+execute)
# Group: 5 (read+execute)
# Others: 5 (read+execute)
```

**Common permissions:**
```
755 = rwxr-xr-x (owner full, others read+execute)
644 = rw-r--r-- (owner read+write, others read)
777 = rwxrwxrwx (everyone has full access) ⚠️ RISKY
700 = rwx------ (only owner can access) ✓ SECURE
```

### **Changing Ownership - `chown` command**

```bash
chown john file.txt         # Change owner to john
chown john:group file.txt   # Change owner and group
chown -R john /home/john    # Change recursively
```

---

## 2.5 File Search and Finding

### **`find` command - Powerful file searching**

**Find by name:**
```bash
find /home -name "report.pdf"
# Find "report.pdf" anywhere under /home
```

**Find by partial name (wildcard):**
```bash
find /home -name "*.txt"
# Find all .txt files
```

**Find by size:**
```bash
find /home -size +10M
# Find files larger than 10MB

find /home -size -1M
# Find files smaller than 1MB
```

**Find by modification time:**
```bash
find /home -mtime -7
# Find files modified in last 7 days

find /home -mtime +30
# Find files not modified for 30+ days
```

**Find by type:**
```bash
find /home -type f
# Find regular files only

find /home -type d
# Find directories only

find /home -type l
# Find symbolic links
```

**Find and perform action:**
```bash
find /tmp -type f -delete
# Find all files in /tmp and delete them

find /home -name "*.log" -exec rm {} \;
# Find all .log files and delete them
```

**Combining conditions:**
```bash
find /home -type f -name "*.txt" -size +1M -mtime -7
# Find .txt files larger than 1MB modified in last 7 days
```

---

### **`grep` command - Search inside files**

**Search for text in file:**
```bash
grep "error" logfile.txt
# Shows lines containing "error"
```

Output:
```
[ERROR] Something went wrong
[ERROR] Connection failed
```

**Case-insensitive search:**
```bash
grep -i "Error" logfile.txt
# Finds "error", "Error", "ERROR"
```

**Show line numbers:**
```bash
grep -n "error" logfile.txt
# 5:[ERROR] Something went wrong
# 12:[ERROR] Connection failed
```

**Count occurrences:**
```bash
grep -c "error" logfile.txt
# 2
```

**Invert match (lines NOT containing):**
```bash
grep -v "error" logfile.txt
# Shows all lines except those with "error"
```

**Search in multiple files:**
```bash
grep "error" *.log
# Searches all .log files

grep -r "error" /var/log/
# Search recursively in directory
```

---

## 2.6 Hard Links and Symbolic Links

### **Inodes - The File ID System**

Think of inode as the unique ID and location of a file:

```
Filename      → Points to Inode → Actual Data on Disk
file.txt      → Inode #5678    → [data content here]
```

### **Hard Links**

A hard link is **another name** for the same inode.

**Creating hard link:**
```bash
ln original.txt hardlink.txt
# Both names point to same inode
# Both have same content
```

**Visualized:**
```
original.txt ─┐
              ├─→ Inode #5678 → [File Data]
hardlink.txt ─┘

Both files have same data
Deleting one doesn't delete data (other link still exists)
```

**Key characteristics:**
- Both files show identical content
- Deleting one doesn't affect other (data remains until all links deleted)
- Can't create hard links across file systems
- Can't create hard links to directories
- `ls -l` shows link count

```bash
ls -l
-rw-r--r-- 2 john users 1024 Mar 15 original.txt
-rw-r--r-- 2 john users 1024 Mar 15 hardlink.txt
                    ↑
               Both have 2 links
```

---

### **Symbolic Links (Soft Links)**

A symbolic link is a **shortcut** to a file.

**Creating symbolic link:**
```bash
ln -s original.txt symlink.txt
# Creates shortcut to original.txt
```

**Visualized:**
```
symlink.txt → (shortcut/path) → original.txt → Inode #5678 → [File Data]

If original.txt deleted → symlink is "broken"
```

**Key characteristics:**
- Points to filename, not inode
- If original deleted, link is broken
- Can create symbolic links to directories
- Can span across file systems
- Shows as `l` in `ls -l`

```bash
ls -l
-rw-r--r-- 1 john users 1024 Mar 15 original.txt
lrwxrwxrwx 1 john users   14 Mar 15 symlink.txt → original.txt
↑
Symbolic link indicator
```

### **When to Use Which?**

| Scenario | Use |
|----------|-----|
| Link files on same filesystem | Hard link |
| Need to link directories | Symbolic link |
| Link across different hard drives | Symbolic link |
| Want automatic following | Symbolic link |
| Want data to persist if original deleted | Hard link |

---

## 2.7 File Timestamps

### **Three Important Timestamps:**

```
Access Time (atime) = Last time file was read
Modify Time (mtime) = Last time file contents changed
Change Time (ctime) = Last time metadata changed
```

**View timestamps:**
```bash
ls -l
-rw-r--r-- 1 john users 1024 Mar 15 10:30 file.txt
                              └─ mtime (modify time)

stat file.txt
# Shows all three timestamps
```

### **Changing Timestamps - `touch` command**

**Update modification time to now:**
```bash
touch file.txt
# Updates mtime to current time
```

**Set specific date/time:**
```bash
touch -t 202303151030 file.txt
# Sets date to 2023-03-15, time 10:30
```

**Set to specific date:**
```bash
touch -d "2023-03-15" file.txt
# Sets to March 15, 2023
```

---

## 2.8 Input/Output Redirection and Pipes

### **Output Redirection - `>`**

**Send output to file:**
```bash
echo "Hello World" > output.txt
# Creates/overwrites output.txt with "Hello World"
```

**Append to file:**
```bash
echo "New line" >> output.txt
# Adds "New line" to end of output.txt
```

**Redirect errors:**
```bash
command 2> errors.txt
# Send error messages to file

command 2>&1 output.txt
# Send both output and errors to file
```

### **Input Redirection - `<`**

**Send file as input:**
```bash
cat < myfile.txt
# Uses myfile.txt as input to cat
```

**Common use:**
```bash
wc -l < myfile.txt
# Count lines in myfile.txt
```

---

### **Pipes - `|`**

**Connect output of one command to input of another:**

```bash
cat logfile.txt | grep "error"
# Output of cat becomes input to grep
# Shows only lines containing "error"
```

**Multiple pipes:**
```bash
cat logfile.txt | grep "error" | wc -l
# Finds lines with "error" and counts them
```

**Real examples:**

**Example 1: Count errors in log**
```bash
cat /var/log/syslog | grep "error" | wc -l
# 245
# There are 245 error lines
```

**Example 2: Find large files and sort**
```bash
find /home -type f -size +10M | sort
# Lists all files >10MB, sorted alphabetically
```

**Example 3: Count running processes**
```bash
ps aux | grep "python" | wc -l
# How many python processes are running?
```

---

## Summary of Module 2

✅ **You now understand:**
1. File creation, viewing, copying, moving, deleting
2. File listing with detailed information
3. File permissions (rwx) and changing them
4. File searching (find, grep)
5. Hard links vs symbolic links
6. File timestamps and modifying them
7. Input/output redirection and pipes

**Next**: Module 3 - Text Filtering and Processing

---

# 🟢 MODULE 3: ROW-WISE AND COLUMN-WISE FILE SELECTION (7 hours | 14 marks)

## 3.1 Understanding Text File Structure

### **Structured Data Example**

Consider a student database file:
```
name:age:grade:marks
john:20:A:85
sarah:19:B:78
mike:21:A:92
```

**Rows**: Each line is a row (one student)
**Columns**: Data separated by `:` (name, age, grade, marks)

```
       Column1  Column2  Column3  Column4
Row 1:  name     age      grade    marks
Row 2:  john     20        A        85
Row 3:  sarah    19        B        78
Row 4:  mike     21        A        92
```

---

## 3.2 Row-wise Selection (Selecting Lines)

### **`head` - Get first N lines**

**First 10 lines (default):**
```bash
head students.txt
name:age:grade:marks
john:20:A:85
sarah:19:B:78
mike:21:A:92
emma:20:B:88
```

**First 3 lines:**
```bash
head -3 students.txt
name:age:grade:marks
john:20:A:85
sarah:19:B:78
```

**Use case**: Preview large files without loading entire file

---

### **`tail` - Get last N lines**

**Last 10 lines (default):**
```bash
tail logfile.txt
[shows last 10 lines]
```

**Last 5 lines:**
```bash
tail -5 logfile.txt
```

**Monitor log file in real-time:**
```bash
tail -f logfile.txt
# Updates as new lines are added (press Ctrl+C to stop)
# Useful for watching server logs
```

---

### **`sed` - Stream Editor (Advanced)**

Transform text based on patterns.

**Print specific lines:**
```bash
sed -n '2,4p' students.txt
# Print lines 2 to 4
john:20:A:85
sarah:19:B:78
mike:21:A:92
```

**Delete lines:**
```bash
sed '3d' students.txt
# Delete line 3 (output to screen, doesn't modify file)
name:age:grade:marks
john:20:A:85
mike:21:A:92
emma:20:B:88
```

**Replace text:**
```bash
sed 's/john/JOHN/' students.txt
# Replace first "john" in each line with "JOHN"

sed 's/john/JOHN/g' students.txt
# Replace ALL occurrences of "john" with "JOHN"
```

**Save changes to file:**
```bash
sed -i 's/john/JOHN/g' students.txt
# -i = modify file in place
```

---

### **`grep` for Row Selection**

Find rows matching pattern:

```bash
grep "A" students.txt
# Show only students with grade A
john:20:A:85
mike:21:A:92
```

**With line numbers:**
```bash
grep -n "A" students.txt
1:name:age:grade:marks
2:john:20:A:85
4:mike:21:A:92
```

**Lines NOT matching:**
```bash
grep -v "A" students.txt
# Show students without grade A
sarah:19:B:78
emma:20:B:88
```

---

## 3.3 Column-wise Selection (Extracting Fields)

### **`cut` command - Extract specific columns**

**Understanding field separator:**

```
john:20:A:85
│    │  │  │
1    2  3  4  (field numbers)
```

**Extract field 1 (name):**
```bash
cut -d: -f1 students.txt
# -d: = delimiter is colon
# -f1 = field 1
name
john
sarah
mike
emma
```

**Extract multiple fields:**
```bash
cut -d: -f1,3 students.txt
# Extract fields 1 and 3 (name and grade)
name:grade
john:A
sarah:B
mike:A
emma:B
```

**Extract range of fields:**
```bash
cut -d: -f2-4 students.txt
# Fields 2 through 4 (age, grade, marks)
age:grade:marks
20:A:85
19:B:78
21:A:92
20:B:88
```

**Extract by character position:**
```bash
cut -c1-5 students.txt
# Extract characters 1-5 from each line
name:
john:
sarah
mike:
emma:
```

### **`paste` command - Combine fields**

**Merge lines side by side:**

File 1: names.txt
```
john
sarah
mike
```

File 2: ages.txt
```
20
19
21
```

**Paste together:**
```bash
paste names.txt ages.txt
john    20
sarah   19
mike    21
```

**Use different delimiter:**
```bash
paste -d: names.txt ages.txt
john:20
sarah:19
mike:21
```

**Paste multiple files:**
```bash
paste names.txt ages.txt grades.txt
john    20    A
sarah   19    B
mike    21    A
```

---

## 3.4 Text Sorting

### **`sort` command - Arrange lines**

**Basic sort (alphabetical):**
```bash
sort students.txt
emma:20:B:88
john:20:A:85
mike:21:A:92
name:age:grade:marks
sarah:19:B:78
```

**Sort in reverse:**
```bash
sort -r students.txt
# Z to A (reverse alphabetical)
sarah:19:B:78
name:age:grade:marks
mike:21:A:92
john:20:A:85
emma:20:B:88
```

**Sort by specific column:**
```bash
sort -t: -k2 students.txt
# -t: = delimiter is colon
# -k2 = sort by field 2 (age)
sarah:19:B:78
emma:20:B:88
john:20:A:85
mike:21:A:92
```

**Numeric sort:**
```bash
sort -t: -k2 -n students.txt
# -n = numeric sort (treats 19 < 20, not string comparison)
sarah:19:B:78
emma:20:B:88
john:20:A:85
mike:21:A:92
```

**Sort by marks (field 4, numeric, reverse):**
```bash
sort -t: -k4 -rn students.txt
# Show students by marks (highest first)
mike:21:A:92
john:20:A:85
emma:20:B:88
sarah:19:B:78
```

---

### **`uniq` command - Remove duplicates**

**File with duplicates:**
```
apple
apple
banana
cherry
cherry
cherry
date
```

**Remove duplicate consecutive lines:**
```bash
uniq fruits.txt
apple
banana
cherry
date
```

**Count occurrences:**
```bash
uniq -c fruits.txt
  2 apple
  1 banana
  3 cherry
  1 date
```

**Show only duplicates:**
```bash
uniq -d fruits.txt
apple
cherry
```

**Note**: `uniq` requires sorted data for full effect

**Proper usage:**
```bash
sort fruits.txt | uniq
# First sort, then remove duplicates
```

---

### **`wc` command - Count lines, words, characters**

```bash
wc students.txt
  5  20 100 students.txt
  │  │   │
lines words chars
```

**Count only lines:**
```bash
wc -l students.txt
5 students.txt
```

**Count only words:**
```bash
wc -w students.txt
20 students.txt
```

**Count characters:**
```bash
wc -c students.txt
100 students.txt
```

**Count lines in multiple files:**
```bash
wc -l *.txt
 5 file1.txt
10 file2.txt
15 total
```

---

## 3.5 Text Transformation

### **`tr` command - Translate characters**

**Convert to uppercase:**
```bash
echo "hello world" | tr a-z A-Z
HELLO WORLD
```

**Convert to lowercase:**
```bash
echo "HELLO WORLD" | tr A-Z a-z
hello world
```

**Replace characters:**
```bash
echo "hello" | tr 'aeiou' '12345'
h2ll5
```

**Delete characters:**
```bash
echo "hello world" | tr -d ' '
helloworld
# Removes spaces
```

**Squeeze multiple spaces to one:**
```bash
echo "hello    world" | tr -s ' '
hello world
```

---

## 3.6 Advanced Text Processing with `awk`

### **What is AWK?**

AWK is a powerful text processing language. It processes files **line by line**.

**Basic structure:**
```bash
awk 'pattern { action }' file
```

### **Field Variables in AWK**

```
$0 = entire line
$1 = first field
$2 = second field
$3 = third field
etc.
```

**Example file:**
```
john 20 85
sarah 19 78
mike 21 92
```

### **Simple AWK Examples**

**Print entire file:**
```bash
awk '{print}' students.txt
# Same as cat
```

**Print specific field:**
```bash
awk '{print $1}' students.txt
john
sarah
mike
```

**Print multiple fields:**
```bash
awk '{print $1, $3}' students.txt
john 85
sarah 78
mike 92
```

**Print with formatting:**
```bash
awk '{printf "%s scored %d\n", $1, $3}' students.txt
john scored 85
sarah scored 78
mike scored 92
```

**Using field separator (colon):**
```bash
awk -F: '{print $1, $3}' students.txt
# -F: = set field separator to colon
```

---

### **AWK Conditions**

```bash
awk '$3 > 80 {print $1}' students.txt
# Print name of students with marks > 80
john
mike
```

**Comparison operators:**
```
==  equals
!=  not equals
<   less than
>   greater than
<=  less than or equal
>=  greater than or equal
```

**Multiple conditions:**
```bash
awk '$3 > 80 && $2 < 21 {print $1, $3}' students.txt
# Marks > 80 AND age < 21
john 85
mike 92
```

---

### **AWK BEGIN and END**

**BEGIN - Execute before reading file:**
```bash
awk 'BEGIN {print "=== Student Report ==="} {print $1, $3} END {print "=== End ==="}' students.txt
=== Student Report ===
john 85
sarah 78
mike 92
=== End ===
```

**Calculate sum:**
```bash
awk '{sum += $3} END {print "Total marks:", sum}' students.txt
Total marks: 255
```

**Calculate average:**
```bash
awk '{sum += $3} END {print "Average:", sum/NR}' students.txt
Average: 85
```

(NR = Number of Records = number of lines)

---

### **AWK Built-in Variables**

| Variable | Meaning |
|----------|---------|
| NR | Number of records (line number) |
| NF | Number of fields in current line |
| FS | Field separator (default: space) |
| OFS | Output field separator |
| RS | Record separator (default: newline) |
| ORS | Output record separator |

**Using NF (number of fields):**
```bash
awk '{print NF, $0}' students.txt
# Shows field count and entire line
3 john 20 85
3 sarah 19 78
3 mike 21 92
```

---

## Summary of Module 3

✅ **You now understand:**
1. Row selection (head, tail, grep, sed)
2. Column selection (cut, paste)
3. Sorting data (sort, uniq)
4. Text transformation (tr)
5. Advanced text processing (awk)

**Next**: Module 4 - Utility Commands

---

# 🟢 MODULE 4: UTILITY COMMANDS (2 hours | marks vary)

Quick-reference guide for system utility commands.

## 4.1 System Information Commands

### **`date` - Show current date and time**

```bash
date
Tue Mar 15 14:30:45 UTC 2024

# Custom format
date "+%Y-%m-%d %H:%M:%S"
2024-03-15 14:30:45
```

### **`uname` - System information**

```bash
uname -a
# Kernel name, hardware, OS info

uname -s
# Kernel name (Linux)

uname -r
# Kernel release (5.10.0)
```

### **`whoami` - Current user**

```bash
whoami
john
```

### **`hostname` - Computer name**

```bash
hostname
mycomputer
```

---

## 4.2 Process Management

### **`ps` - List running processes**

```bash
ps
# Current terminal processes

ps aux
# All processes in detail
```

### **`top` - Real-time process monitor**

```bash
top
# Like Task Manager in Windows
# Shows CPU, memory usage
# Press 'q' to quit
```

---

## 4.3 Calculator and Text

### **`echo` - Print text**

```bash
echo "Hello World"
Hello World

echo "The date is $(date)"
The date is Tue Mar 15 14:30:45 UTC 2024
```

### **`bc` - Calculator**

```bash
bc
# Interactive mode
3 + 5
8
10 / 2
5
ctrl+d (exit)

# Direct calculation
echo "15 * 5" | bc
75

echo "scale=2; 10/3" | bc
3.33
```

---

## 4.4 File Compression

### **`gzip` - Compress single file**

```bash
gzip myfile.txt
# Creates myfile.txt.gz (original deleted)

gzip -k myfile.txt
# -k = keep original file

gunzip myfile.txt.gz
# Uncompress
```

### **`zip` - Create .zip archive**

```bash
zip archive.zip file1.txt file2.txt
# Creates archive.zip with two files

unzip archive.zip
# Extract files
```

---

## Summary of Module 4

✅ **Quick utility commands reference**

**Next**: Module 5 - Vi Editor

---

# 🟢 MODULE 5: VI EDITOR (2 hours | 5 marks)

## 5.1 Introduction to Vi

### **What is Vi?**

- Ancient text editor (created in 1976)
- Built into every Unix/Linux system
- Two main modes: **insert mode** and **command mode**
- Steep learning curve but very powerful

---

## 5.2 Two Modes of Vi

### **Mode 1: INSERT MODE**
- Type and edit text
- Press `i` to enter
- Press `Esc` to exit

### **Mode 2: COMMAND MODE**
- Execute commands
- Default mode when opening vi
- Delete, copy, paste, search, etc.

---

## 5.3 Starting and Exiting Vi

**Open file:**
```bash
vi myfile.txt
# Opens file (empty if doesn't exist)
```

**Exit without saving:**
```bash
:q!
# Esc then type :q!
```

**Save and exit:**
```bash
:wq
# Esc then type :wq
```

**Save only:**
```bash
:w
```

---

## 5.4 Inserting Text

**Enter insert mode:**
```bash
i = insert at cursor position
I = insert at beginning of line
a = append after cursor
A = append at end of line
o = open new line below
O = open new line above
```

**Example:**
```bash
1. Press 'i' to enter insert mode
2. Type your text
3. Press 'Esc' to exit insert mode
```

---

## 5.5 Navigation (Command Mode)

### **Movement Keys**
```bash
h = left
j = down
k = up
l = right
```

**Or use arrow keys** (easier for beginners)

### **Faster Movement**
```bash
w = next word
b = previous word
G = end of file
1G = beginning of file
nG = go to line n (10G = go to line 10)
```

---

## 5.6 Deleting Text (Command Mode)

```bash
x = delete character under cursor
dw = delete word
dd = delete entire line
d$ = delete to end of line
d0 = delete to beginning of line
5dd = delete 5 lines
```

---

## 5.7 Copy and Paste (Command Mode)

```bash
yy = copy line
5yy = copy 5 lines
p = paste below cursor
P = paste above cursor
```

---

## 5.8 Undo and Redo

```bash
u = undo
ctrl+r = redo
```

---

## 5.9 Search (Command Mode)

```bash
/word = search for "word" (forward)
?word = search backward
n = next match
N = previous match
```

---

## 5.10 Find and Replace (Command Mode)

```bash
:%s/old/new/g
# Replace all "old" with "new"
# % = entire file
# g = global (all occurrences)

:s/old/new
# Replace in current line only

:10,20s/old/new/g
# Replace in lines 10-20
```

---

## 5.11 Quick Vi Cheat Sheet

| Action | Command |
|--------|---------|
| Open file | `vi filename` |
| Enter insert | `i` |
| Exit insert | `Esc` |
| Save | `:w` |
| Quit | `:q` |
| Save & quit | `:wq` |
| Quit without saving | `:q!` |
| Delete line | `dd` |
| Copy line | `yy` |
| Paste | `p` |
| Undo | `u` |
| Search | `/word` |
| Replace all | `:%s/old/new/g` |

---

## Summary of Module 5

✅ **You understand:**
1. Insert and command modes
2. Navigating in vi
3. Inserting, deleting, copying text
4. Searching and replacing
5. Saving and exiting

**Next**: Module 6 - grep and awk (Advanced!)

---

# 🟢 MODULE 6: GREP AND AWK (8 hours | 15 marks)

This is the most important module! These tools are used daily in real work.

## 6.1 GREP - Global Regular Expression Print

### **What is GREP?**

GREP searches for text patterns in files. It's the most used command in Linux.

---

## 6.2 Regular Expressions (Regex)

### **Special Characters in Regex**

```
.    = any single character
*    = zero or more of previous character
+    = one or more of previous character
?    = zero or one of previous character
^    = beginning of line
$    = end of line
[ ]  = any character in brackets
```

### **Examples:**

```bash
grep "cat" file.txt
# Lines containing "cat" (cat, catalog, concatenate)

grep "^cat" file.txt
# Lines starting with "cat"

grep "cat$" file.txt
# Lines ending with "cat"

grep "c.t" file.txt
# "cot", "cat", "cut" (any single char between c and t)

grep "c.*t" file.txt
# "cat", "cot", "count" (any chars between c and t)

grep "[aeiou]" file.txt
# Lines containing vowels

grep "[^aeiou]" file.txt
# Lines NOT containing vowels
```

---

## 6.3 Basic GREP Usage

**Search in single file:**
```bash
grep "error" logfile.txt
```

**Search in multiple files:**
```bash
grep "error" *.txt
# Searches all .txt files
```

**Recursive search (entire directory):**
```bash
grep -r "error" /var/log/
# Searches all files in /var/log and subdirectories
```

**Case-insensitive:**
```bash
grep -i "ERROR" logfile.txt
# Matches "error", "Error", "ERROR"
```

**Show line numbers:**
```bash
grep -n "error" logfile.txt
5:[ERROR] Database connection failed
12:[ERROR] Authentication failed
```

**Count matches:**
```bash
grep -c "error" logfile.txt
# 2
```

**Invert match (lines WITHOUT pattern):**
```bash
grep -v "error" logfile.txt
# Show lines that DON'T contain "error"
```

**Show context (lines before and after):**
```bash
grep -C 2 "error" logfile.txt
# Show 2 lines before and after match

grep -B 2 "error" logfile.txt
# Show 2 lines before

grep -A 3 "error" logfile.txt
# Show 3 lines after
```

---

## 6.4 Advanced GREP

### **Extended Regex with `grep -E`**

```bash
grep -E "cat|dog" file.txt
# Lines with "cat" OR "dog"

grep -E "^[0-9]" file.txt
# Lines starting with number

grep -E "[0-9]{3}" file.txt
# Lines containing 3 consecutive digits
```

### **Practical Examples**

**Find email addresses:**
```bash
grep -E "[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+" file.txt
```

**Find IP addresses:**
```bash
grep -E "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" file.txt
# 192.168.1.1, 10.0.0.5, etc.
```

**Find lines with only numbers:**
```bash
grep -E "^[0-9]+$" file.txt
```

---

## 6.5 AWK - Text Processing Language

### **What is AWK?**

AWK is a programming language for processing text files. It processes **line by line**.

**Structure:**
```bash
awk 'pattern { action }' file
```

---

## 6.6 Basic AWK Usage

### **Print entire file:**
```bash
awk '{print}' file.txt
# Same as cat
```

### **Print specific columns:**

File content:
```
john 20 85
sarah 19 78
mike 21 92
```

```bash
awk '{print $1}' file.txt
john
sarah
mike

awk '{print $1, $3}' file.txt
john 85
sarah 78
mike 92
```

### **Using field separator:**

For colon-separated file:
```bash
awk -F: '{print $1}' /etc/passwd
# Shows all usernames
```

---

## 6.7 AWK Patterns and Conditions

### **Pattern matching:**

```bash
awk '/john/ {print}' file.txt
# Print lines containing "john"

awk 'NR==2 {print}' file.txt
# Print line 2 only

awk 'NR>1 {print}' file.txt
# Print all lines except first
```

### **Numeric comparison:**

```bash
awk '$3 > 85 {print $1, $3}' file.txt
# Print name and marks for marks > 85
john 85
mike 92

awk '$3 < 80 && $2 > 19 {print}' file.txt
# Marks < 80 AND age > 19
sarah 19 78  (doesn't match, age=19 not >19)
```

---

## 6.8 AWK Variables and Calculations

### **Built-in variables:**

```bash
NR = number of records (line number)
NF = number of fields
FS = field separator
OFS = output field separator
RS = record separator
ORS = output record separator
```

### **Examples:**

**Count lines:**
```bash
awk 'END {print NR}' file.txt
3
```

**Calculate sum:**
```bash
awk '{sum += $3} END {print sum}' file.txt
# Total of column 3
255
```

**Calculate average:**
```bash
awk '{sum += $3} END {print sum/NR}' file.txt
85
```

**Add column:**
```bash
awk '{print $1, $3, $3 + 10}' file.txt
john 85 95
sarah 78 88
mike 92 102
```

---

## 6.9 AWK BEGIN and END

### **BEGIN - Execute before reading file**

```bash
awk 'BEGIN {print "=== Report ==="}' file.txt
=== Report ===
```

### **END - Execute after reading entire file**

```bash
awk '{sum += $3} END {print "Total:", sum}' file.txt
Total: 255
```

### **Full example:**

```bash
awk 'BEGIN {print "Name\tMarks"}
     {print $1, "\t", $3}
     END {print "---Total---"}' file.txt

Name	Marks
john 	 85
sarah	 78
mike 	 92
---Total---
```

---

## 6.10 AWK String Functions

### **String manipulation:**

```bash
length($1)      = length of field
substr($1, 2, 3) = substring from position 2, length 3
index($1, "x")  = position of "x" in field
split($1, arr, ":") = split field by colon
```

**Example:**
```bash
echo "john:smith:25" | awk '{split($1, arr, ":"); print arr[2]}'
smith
```

---

## 6.11 AWK Loops

### **For loop:**

```bash
awk 'BEGIN {for (i=1; i<=3; i++) print "Line " i}'
Line 1
Line 2
Line 3
```

### **While loop:**

```bash
awk 'BEGIN {i=1; while (i<=3) {print i; i++}}'
1
2
3
```

---

## 6.12 Practical GREP and AWK Examples

### **Example 1: Extract errors from log**

```bash
grep "ERROR" /var/log/apache2/error.log | grep "2024" | wc -l
# Count errors in 2024
```

### **Example 2: Process CSV file**

File: students.csv
```
john,20,85,A
sarah,19,78,B
mike,21,92,A
```

**Get names of A grade students:**
```bash
awk -F, '$4=="A" {print $1}' students.csv
john
mike
```

**Calculate average marks:**
```bash
awk -F, '{sum += $3} END {print sum/NR}' students.csv
85
```

### **Example 3: Analyze web server logs**

Log format: `IP URL Status`

```bash
awk '{print $1}' access.log | sort | uniq -c
# Count requests per IP address

awk '$3 == 404 {print $1}' access.log
# Show IPs that got 404 errors
```

### **Example 4: Monitor system**

```bash
ps aux | awk '$3 > 50 {print $1, $3 "%"}'
# Show processes using >50% CPU
```

---

## 6.13 GREP vs AWK vs SED

| Tool | Best For |
|------|----------|
| grep | Finding text patterns |
| awk | Structured text processing, calculations |
| sed | Find and replace, text transformation |
| cut | Extract specific columns |
| tr | Character translation |

---

## Summary of Module 6

✅ **You understand:**
1. Regular expressions (regex patterns)
2. GREP for searching text
3. AWK for processing structured data
4. Combining grep and awk for powerful results
5. Real-world use cases

**Next**: Module 7 - Processes in Unix

---

# 🟢 MODULE 7: PROCESSES IN UNIX (8 hours | 9 marks)

## 7.1 What is a Process?

### **Definition**

A process is a **running program** with:
- Its own memory space
- Unique identifier (PID)
- Relationship to parent process
- Current state (running, sleeping, stopped)

### **Process vs Program**

```
Program = Code on disk (static)
Process = Program in memory (dynamic, executing)
```

**Example:**
- **Program**: /usr/bin/firefox (file on disk)
- **Process**: Firefox running in RAM with PID 1234

---

## 7.2 Process Identification

### **PID (Process ID)**

Unique number identifying each process.

```bash
ps
PID    TTY    TIME   CMD
1234   pts/0  00:00  bash
1567   pts/0  00:01  firefox
1890   pts/0  00:00  grep
```

### **PPID (Parent Process ID)**

Every process has a parent process that created it.

```bash
ps -o pid,ppid,cmd
PID  PPID  CMD
1234  1000  bash
1567  1234  firefox    (firefox started by bash)
```

---

## 7.3 Process Creation

### **`fork()` System Call**

Creates a child process that is a copy of parent.

```
Parent Process (PID 100)
    │
    ├─ fork() called
    │
    ├─→ Child Process 1 (PID 101) - copy of parent
    │
    ├─→ Child Process 2 (PID 102) - another copy
    │
    └─ Parent continues
```

**In bash script:**
```bash
#!/bin/bash
echo "Parent PID: $$"  # $$ = current PID

./script.sh &
# & sends script to background
# Creates child process
```

### **`exec()` System Call**

Replaces current process with new program.

```
Process 1 (firefox)
    │
    └─ exec(/bin/bash)
        │
        └─ Process 2 (bash) - replaced firefox
```

---

## 7.4 Viewing Processes

### **`ps` command**

**Simple view:**
```bash
ps
PID TTY      TIME CMD
5002 pts/0   00:00 bash
5234 pts/0   00:00 ps
```

**Detailed view:**
```bash
ps aux
USER    PID  %CPU %MEM  TIME   CMD
john    100  2.5  10.5  00:15  firefox
john    101  1.2  5.3   00:08  gedit
root    1    0.0  0.1   00:00  init
```

**Show process tree:**
```bash
ps auxf
# Shows parent-child relationships with lines
```

**Monitor specific process:**
```bash
ps aux | grep firefox
```

### **`pstree` command**

Shows processes in tree format:

```bash
pstree
systemd(1)
 ├─bash(100)
 │ └─firefox(101)
 │   ├─firefox(102)
 │   └─firefox(103)
 ├─nginx(200)
 │ ├─nginx(201)
 │ └─nginx(202)
 └─mysql(300)
```

---

## 7.5 Process States

### **States in Linux**

```
Running (R)    = executing on CPU
Sleeping (S)   = waiting for something (device, I/O)
Zombie (Z)     = dead but parent hasn't cleaned up
Stopped (T)    = paused (Ctrl+Z)
```

### **State Diagram**

```
┌──────────────┐
│   Running    │ ◄─────┐
└──────┬───────┘       │
       │               │
       ▼               │
┌──────────────┐       │
│  Sleeping    │───────┘ (when ready)
└──────────────┘

       ▼

┌──────────────┐
│   Zombie     │
└──────────────┘
```

---

## 7.6 Process Control

### **Running process in background**

```bash
firefox &
# Starts firefox and returns prompt
[1] 1234     (job number and PID)
```

### **Running in foreground**

```bash
firefox
# Terminal waits for firefox to close
```

### **Pausing a process (Ctrl+Z)**

```bash
firefox
# User presses Ctrl+Z
[1]  Stopped    firefox

# Resume in background
bg
# Resume in foreground
fg
```

### **Kill process**

```bash
kill 1234
# Send SIGTERM (terminate) signal

kill -9 1234
# Send SIGKILL (force kill) signal

killall firefox
# Kill all processes named firefox
```

---

## 7.7 Waiting for Processes

### **`wait()` System Call**

Parent process waits for child to finish.

```bash
#!/bin/bash
echo "Starting backup..."
./backup.sh
# Script waits here until backup.sh finishes
wait
echo "Backup complete!"
```

### **Background processes:**

```bash
./process1.sh &
./process2.sh &
wait
# Waits for both to finish
echo "All done!"
```

---

## 7.8 Zombie Processes

### **What is a Zombie?**

A zombie is a process that has finished but parent hasn't collected its status.

```
Parent creates Child
    │
    └─→ Child (PID 100) runs
        
Child finishes
    │
    └─→ Child becomes Zombie (waiting for parent to read status)
        │
        └─→ Parent calls wait() → Zombie cleaned up
```

### **Detecting zombies:**

```bash
ps aux | grep Z
john   100  0.0  0.0   0  0 pts/0  Z+  10:30  0:00 [child] <defunct>
```

### **Preventing zombies:**

```bash
#!/bin/bash

# Bad - creates zombie
./child.sh &
# Parent exits without waiting

# Good
./child.sh &
wait  # Parent waits for child
```

---

## 7.9 Process Scheduling

### **CPU Scheduling**

The kernel decides which process uses CPU when.

```
Process 1: ███░░░░░░░░░░░░░░░░
Process 2: ░░░███░░░░░░░░░░░░░░
Process 3: ░░░░░░░███░░░░░░░░░░

Time →
```

### **Time Slicing**

Each process gets small time slot (time slice/quantum).

```bash
Process A gets CPU for 10ms
    ↓
Context switch
    ↓
Process B gets CPU for 10ms
    ↓
Context switch
    ↓
Process C gets CPU for 10ms
    ... repeats
```

### **Priority**

Processes with higher priority get more CPU time.

**View priorities:**
```bash
ps -l
F S   UID   PID  PPID PRI NICE
0 S  1000  100  1000  20   0
0 S  1000  101  1000  24   4
```

- `PRI` = priority (lower = higher priority)
- `NICE` = how nice to other processes

---

## 7.10 System Performance Monitoring

### **`top` command**

Real-time process monitor:

```bash
top
Tasks: 156 total, 2 running, 154 sleeping, 0 stopped, 0 zombie
%Cpu(s): 12.5 us, 3.2 sy, 0.0 ni, 84.3 id
MiB Mem: 7823.4 total, 4562.1 used, 3261.3 free

PID USER    PR NI  VIRT  RES %CPU %MEM    TIME+ COMMAND
100 john    20  0 2345M 456M 12.5 5.8     5:23 firefox
101 john    20  0 1234M 234M  3.2 3.0     2:15 gedit
102 root    20  0  567M  89M  0.8 1.1     0:45 nginx
```

**Interactive commands in top:**
- `q` = quit
- `P` = sort by CPU
- `M` = sort by memory
- `k` = kill process
- `r` = change priority

### **`vmstat` - Virtual Memory Status**

```bash
vmstat 1 5
# Shows stats every 1 second, 5 times

procs -----------memory---------- ---swap-- -----io---- -system-- ------cpu-----
 r  b   swpd   free   buff  cache   si   so    bi    bo   in   cs us sy id wa st
 1  0      0 4456832 234567 123456  0    0    45   123  456  234 12  3 85  0  0
```

**Columns:**
- `r` = running processes
- `b` = blocked processes
- `swpd` = swapped memory
- `free` = free memory
- `us` = user CPU %
- `sy` = system CPU %
- `id` = idle %
- `wa` = wait for I/O %

---

## 7.11 Memory Management

### **Virtual Memory**

RAM is limited, so Linux uses disk as extra memory.

```
┌─────────────────┐
│   Hard Disk     │ Fast storage
├─────────────────┤
│ Virtual Memory  │ (slower)
│ (swap space)    │
└─────────────────┘

┌─────────────────┐
│   RAM (Memory)  │ Very fast
└─────────────────┘
```

**When memory is full:**
1. Least used data moved to disk (swap)
2. Makes room for new data
3. System becomes slower

### **View memory usage:**

```bash
free -h
             total        used        free
Mem:        7.8Gi       4.5Gi       3.3Gi
Swap:       2.0Gi       0.0Gi       2.0Gi
```

---

## 7.12 Pipes and Communication (Bonus)

### **`pipe()` System Call**

Allows processes to send data to each other.

```bash
process1 | process2 | process3

process1 writes → pipe → process2 reads and writes → pipe → process3 reads
```

**Example:**
```bash
cat file.txt | grep "error" | wc -l

1. cat reads file
2. grep receives lines, filters
3. wc counts filtered lines
```

---

## 7.13 Process Management Best Practices

### **Check running processes:**
```bash
ps aux | less
top
```

### **Kill problematic processes:**
```bash
kill -9 PID
```

### **Monitor system:**
```bash
vmstat 1
top
```

### **Avoid zombie processes:**
```bash
# Always wait for child processes
wait
```

---

## Summary of Module 7

✅ **You understand:**
1. What processes are (programs in memory)
2. Process creation (fork, exec)
3. Process states (running, sleeping, stopped, zombie)
4. Process identification (PID, PPID)
5. Process control (kill, suspend, resume)
6. Process scheduling and priority
7. Memory management and virtual memory
8. System performance monitoring (top, vmstat)

**Next**: Module 8 - Shell Programming (Final Module!)

---

# 🟢 MODULE 8: SHELL PROGRAMMING (8 hours | 10 marks)

This module teaches you to write automated scripts!

## 8.1 What is a Shell Script?

### **Definition**

A shell script is a text file containing commands that the shell executes.

**Instead of typing commands one by one:**
```bash
$ cd /home/user
$ ls -la
$ grep "error" *.log > errors.txt
$ wc -l errors.txt
```

**Write a script (automate.sh):**
```bash
#!/bin/bash
cd /home/user
ls -la
grep "error" *.log > errors.txt
wc -l errors.txt
```

**Then run it:**
```bash
bash automate.sh
# All commands execute automatically
```

---

## 8.2 Creating Your First Script

### **Step 1: Create file**
```bash
nano myscript.sh
```

### **Step 2: Write script**
```bash
#!/bin/bash
# This is a comment
echo "Hello, World!"
```

### **Step 3: Save and exit**
```
Ctrl+O (save)
Ctrl+X (exit)
```

### **Step 4: Make executable**
```bash
chmod +x myscript.sh
```

### **Step 5: Run script**
```bash
./myscript.sh
Hello, World!
```

### **Understanding `#!/bin/bash`**

- `#!` = shebang (special marker)
- `/bin/bash` = use bash shell to interpret script
- Must be first line

---

## 8.3 Variables in Shell

### **Creating variables:**

```bash
name="John"
age=25
city="New York"
```

**Rules:**
- No spaces around `=`
- Names are case-sensitive
- Can contain letters, numbers, underscore

### **Using variables:**

```bash
echo $name
echo "My name is $name"
echo "I am ${age} years old"
```

**Output:**
```
John
My name is John
I am 25 years old
```

### **Read user input:**

```bash
#!/bin/bash
echo "Enter your name:"
read username
echo "Hello, $username!"
```

**Running:**
```bash
$ ./script.sh
Enter your name:
John
Hello, John!
```

---

## 8.4 Command Line Arguments

### **Passing arguments to script:**

```bash
./script.sh arg1 arg2 arg3
```

### **Accessing arguments:**

```bash
#!/bin/bash
echo "First argument: $1"
echo "Second argument: $2"
echo "Third argument: $3"
echo "All arguments: $@"
echo "Number of arguments: $#"
```

**Running:**
```bash
$ ./script.sh hello world test

First argument: hello
Second argument: world
Third argument: test
All arguments: hello world test
Number of arguments: 3
```

---

## 8.5 Conditional Statements

### **`if` statement**

```bash
#!/bin/bash
age=20

if [ $age -ge 18 ]; then
    echo "You are an adult"
else
    echo "You are a minor"
fi
```

**Output:**
```
You are an adult
```

### **Comparison operators:**

```
-eq  = equal
-ne  = not equal
-lt  = less than
-le  = less than or equal
-gt  = greater than
-ge  = greater than or equal
```

### **String comparison:**

```bash
#!/bin/bash
name="John"

if [ "$name" = "John" ]; then
    echo "Welcome John!"
else
    echo "Who are you?"
fi
```

**String operators:**
```
=   = equal
!=  = not equal
-z  = is empty
-n  = is not empty
```

### **Multiple conditions:**

```bash
#!/bin/bash
age=25
income=50000

if [ $age -ge 18 ] && [ $income -gt 30000 ]; then
    echo "You can apply for loan"
else
    echo "Not eligible"
fi
```

**Logical operators:**
```
&&  = AND (both must be true)
||  = OR (at least one must be true)
!   = NOT (opposite)
```

### **`elif` (else if):**

```bash
#!/bin/bash
grade=$1

if [ "$grade" = "A" ]; then
    echo "Excellent!"
elif [ "$grade" = "B" ]; then
    echo "Good!"
elif [ "$grade" = "C" ]; then
    echo "Okay"
else
    echo "Need improvement"
fi
```

### **File testing:**

```bash
if [ -f myfile.txt ]; then
    echo "File exists"
fi

if [ -d myfolder ]; then
    echo "Directory exists"
fi

if [ -e file.txt ]; then
    echo "File or directory exists"
fi
```

**File test operators:**
```
-f  = file exists
-d  = directory exists
-e  = exists (file or directory)
-r  = readable
-w  = writable
-x  = executable
-s  = not empty
```

---

## 8.6 Loops

### **`for` loop**

```bash
#!/bin/bash

for i in 1 2 3 4 5
do
    echo "Number: $i"
done
```

**Output:**
```
Number: 1
Number: 2
Number: 3
Number: 4
Number: 5
```

### **For loop with range:**

```bash
#!/bin/bash

for i in {1..5}
do
    echo "Count: $i"
done
```

### **For loop with command:**

```bash
#!/bin/bash

for file in $(ls *.txt)
do
    echo "Processing $file"
done

# Or
for file in *.txt
do
    echo "Processing $file"
done
```

### **While loop**

```bash
#!/bin/bash

count=1
while [ $count -le 5 ]
do
    echo "Count: $count"
    count=$((count + 1))
done
```

**Output:**
```
Count: 1
Count: 2
Count: 3
Count: 4
Count: 5
```

### **Until loop** (opposite of while)

```bash
#!/bin/bash

count=1
until [ $count -gt 5 ]
do
    echo "Count: $count"
    count=$((count + 1))
done
```

**Continues until condition becomes true**

---

## 8.7 Functions

### **Defining functions:**

```bash
#!/bin/bash

greet() {
    echo "Hello, World!"
}

# Call function
greet
greet
```

**Output:**
```
Hello, World!
Hello, World!
```

### **Functions with parameters:**

```bash
#!/bin/bash

add() {
    local sum=$(($1 + $2))
    echo "Sum: $sum"
}

add 5 10
add 20 30
```

**Output:**
```
Sum: 15
Sum: 50
```

### **Functions with return value:**

```bash
#!/bin/bash

multiply() {
    result=$(($1 * $2))
}

multiply 3 4
echo "Result: $result"
```

**Output:**
```
Result: 12
```

---

## 8.8 Arithmetic Operations

### **`let` command:**

```bash
#!/bin/bash

let sum=5+3
echo "Sum: $sum"

let product=4*5
echo "Product: $product"
```

### **`$(( ))` syntax:**

```bash
#!/bin/bash

a=10
b=20
sum=$((a + b))
echo "Sum: $sum"

product=$((a * b))
echo "Product: $product"
```

### **Operations:**

```
+   = addition
-   = subtraction
*   = multiplication
/   = division
%   = modulo (remainder)
```

---

## 8.9 Practical Script Examples

### **Example 1: Backup Script**

```bash
#!/bin/bash

# Variables
source_dir="/home/user/documents"
backup_dir="/backup"
date_suffix=$(date +%Y%m%d)
backup_file="backup_$date_suffix.tar.gz"

# Check if source exists
if [ ! -d "$source_dir" ]; then
    echo "Error: Source directory not found!"
    exit 1
fi

# Create backup
tar -czf "$backup_dir/$backup_file" "$source_dir"

if [ $? -eq 0 ]; then
    echo "Backup successful: $backup_file"
else
    echo "Backup failed!"
    exit 1
fi
```

### **Example 2: System Monitor Script**

```bash
#!/bin/bash

echo "=== System Status ==="
echo "Hostname: $(hostname)"
echo "Kernel: $(uname -r)"
echo ""

echo "=== CPU Usage ==="
top -b -n 1 | head -3

echo ""
echo "=== Memory Usage ==="
free -h | grep Mem

echo ""
echo "=== Disk Usage ==="
df -h | grep "/" | awk '{print $5, "used of", $2}'
```

### **Example 3: Batch File Rename**

```bash
#!/bin/bash

# Rename all .txt files to .txt.bak
for file in *.txt
do
    if [ -f "$file" ]; then
        mv "$file" "$file.bak"
        echo "Renamed: $file → $file.bak"
    fi
done
```

### **Example 4: User Input Menu**

```bash
#!/bin/bash

while true
do
    echo "=== Menu ==="
    echo "1. List files"
    echo "2. Show current directory"
    echo "3. Show date"
    echo "4. Exit"
    echo "Enter choice [1-4]:"
    read choice
    
    case $choice in
        1) ls -la ;;
        2) pwd ;;
        3) date ;;
        4) echo "Goodbye!"; exit 0 ;;
        *) echo "Invalid choice" ;;
    esac
    echo ""
done
```

### **Example 5: Monitoring Log for Errors**

```bash
#!/bin/bash

logfile="/var/log/syslog"
email="admin@example.com"

# Count errors in last 100 lines
errors=$(tail -100 "$logfile" | grep -c "ERROR")

if [ $errors -gt 10 ]; then
    echo "Alert: $errors errors found in last 100 log lines"
    # Could also send email here
else
    echo "OK: Only $errors errors found"
fi
```

---

## 8.10 Exit Status

### **Exit codes:**

```
0 = success
Non-zero = failure
```

### **Using exit status:**

```bash
#!/bin/bash

ls /nonexistent
if [ $? -eq 0 ]; then
    echo "Command successful"
else
    echo "Command failed"
fi
```

**Output:**
```
ls: cannot access '/nonexistent': No such file or directory
Command failed
```

---

## 8.11 Common Mistakes and Best Practices

### **Mistakes to avoid:**

1. **Spaces around `=`**
```bash
# WRONG
name = "John"

# CORRECT
name="John"
```

2. **Forgetting quotes**
```bash
# WRONG (if name has spaces)
echo $name

# CORRECT
echo "$name"
```

3. **Forgetting `then` in if**
```bash
# WRONG
if [ $age -gt 18 ]
    echo "Adult"

# CORRECT
if [ $age -gt 18 ]; then
    echo "Adult"
fi
```

### **Best practices:**

1. **Always quote variables:**
```bash
echo "$name"      # Good
echo $name        # Risky
```

2. **Use meaningful names:**
```bash
# Good
backup_file="backup_$(date +%Y%m%d).tar.gz"

# Poor
f="$(date).tar.gz"
```

3. **Add comments:**
```bash
#!/bin/bash
# This script backs up important files
# Created: 2024-03-15

# Create backup directory
mkdir -p /backup
```

4. **Check for errors:**
```bash
#!/bin/bash

if ! [ -d "/source" ]; then
    echo "Error: Source directory missing"
    exit 1
fi
```

5. **Use functions for reusable code:**
```bash
log_message() {
    echo "[$(date)] $1"
}

log_message "Script started"
```

---

## Summary of Module 8

✅ **You understand:**
1. Creating and running shell scripts
2. Variables and user input
3. Command line arguments
4. Conditional statements (if, elif, else)
5. Loops (for, while, until)
6. Functions
7. Arithmetic operations
8. Real-world script examples
9. Exit status and error handling

---

# 🎓 COMPLETE SYLLABUS SUMMARY

## All Modules at a Glance

| Module | Topics | Key Commands |
|--------|--------|--------------|
| 1 | UNIX/Linux basics, architecture, directory structure | uname, ls, cd |
| 2 | File operations, permissions, links, timestamps | cp, mv, rm, chmod, find, grep |
| 3 | Text filtering, sorting, processing | cut, paste, sort, uniq, wc, awk |
| 4 | System utilities | date, ps, top, echo, bc, zip |
| 5 | Text editor | vi, vim |
| 6 | Text search and processing | grep, sed, awk (advanced) |
| 7 | Process management, memory, scheduling | ps, top, vmstat, kill |
| 8 | Shell scripting and automation | bash, if, for, while, functions |

---

## Key Concepts to Remember

### **File System**
- Everything is a file
- Hierarchical structure (/bin, /home, /etc, /var, etc.)
- Absolute vs relative paths

### **Permissions**
- rwx = read, write, execute
- 755, 644, 777 are common numbers
- chmod, chown for changing

### **Processes**
- PID (process ID), PPID (parent)
- Fork creates child, exec replaces
- States: running, sleeping, zombie, stopped

### **Text Processing**
- grep for searching
- awk for structured processing
- sed for find and replace
- Pipes connect commands

### **Scripting**
- Variables, conditionals, loops
- Functions for reusable code
- Always check return status ($?)

---

## Practice Exercises

### **Module 1-2 Practice:**
1. Create a directory structure
2. Create files with content
3. Change permissions
4. Create symbolic links

### **Module 3 Practice:**
1. Extract columns from CSV
2. Sort data different ways
3. Count occurrences
4. Process and transform data

### **Module 6 Practice:**
1. Search for patterns in files
2. Count matches
3. Extract specific columns with awk
4. Calculate totals with awk

### **Module 8 Practice:**
1. Write backup script
2. Write menu-driven script
3. Write monitoring script
4. Write batch processing script

---

## Final Tips for Exam Preparation

1. **Understand concepts** (not just memorize)
2. **Practice hands-on** (use actual Linux)
3. **Read man pages** (`man command`)
4. **Test your scripts** before using in production
5. **Focus on modules 2, 3, 6, 8** (they're most important)
6. **Review practical examples**
7. **Study error messages** (learn from them)

---

# 🎯 YOU'VE COMPLETED THE ENTIRE LINUX SYLLABUS!

Congratulations on making it through all 8 modules! You now have a comprehensive understanding of:
- Unix/Linux fundamentals
- File and directory management
- Text processing and searching
- System processes and resource management
- Shell scripting and automation

**Next Steps:**
1. Practice on a real Linux system
2. Install Ubuntu or use WSL
3. Create real scripts for your needs
4. Explore advanced topics (networking, system administration)
5. Read Linux man pages
6. Join Linux communities (Reddit, forums)

Good luck with your studies! 🚀

<?php include 'header.php';?>

    <div class="container" style="background:WHITE;margin-top:20px;border-radius:15px;padding:20px">
          <div class="container">
            <h1 class="display-4" style="font-size:30px">Upoad a question!</h1>
            <p class="lead" style="font-size:20px">Please provide the following information regarding the question.</p>
            <hr class="my-4">

            <form action="upQuestions.php" method="POST" autocomplete="off">

            <div class="form-group">
                <label for="exampleFormControlSelect1"style="font-size:15px;font-weight:bold">Class:</label>
                <select class="form-control" style="font-size:15px"name ="subject" id="exampleFormControlSelect1" required="required">
                <option>CS1</option>
                <option>CS2</option>
                </select>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1"style="font-size:15px;font-weight:bold">Topic:</label>
                <select class="form-control" style="font-size:15px"name ="topic" id="exampleFormControlSelect1" required="required">
                
                <option disabled style="font-weight: bold;background:grey;color:white">CS1</option>

                <option>Arithmetic operations with character types</option>
                <option>Arithmetic operators, meaning of equals (=) as assignment operator</option>
                <option>Array processing – iterating through an array</option>
                <option>Arrays in Java</option>
                <option>Arrays in general</option>
                <option>Augmented assignment notation</option>
                <option>Binary Search - algorithm and code</option>
                <option>Break and continue statements in loops</option>
                <option>Bubble Sort - algorithm and code</option>
                <option>Casting between characters and integers</option>
                <option>Characters – ASCII and Unicode characters</option>
                <option>Command-line arguments and the main() method in Java</option>
                <option>Comparing Strings. Lexical ordering</option>
                <option>Conditional expressions</option>
                <option>Conditional statements – (if, if-else statements). </option>
                <option>Console I/O</option>
                <option>Escape sequences for special characters</option>
                <option>File I/O reading and writing to text files</option>
                <option>Flow charts</option>
                <option>For-each enhanced array processing loop</option>
                <option>Formatting output with C-like printf() method</option>
                <option>How are primitive type values passed to methods as arguments? </option>
                <option>Increment and decrement operators, pre- and post-increments. </option>
                <option>Linear search - algorithm and code</option>
                <option>Logical (or Boolean) operators, Truth Tables</option>
                <option>Loops - while loops, do-while loops, for-loops</option>
                <option>Method overloading</option>
                <option>Methods (functions) in Java</option>
                <option>Methods and constants in java.lang.Math class</option>
                <option>Methods in java.lang.Character class</option>
                <option>Methods in the String class</option>
                <option>Multi-way if-else statements</option>
                <option>Named constants</option>
                <option>Named constants, Literals</option>
                <option>Nested if-else statements</option>
                <option>Nested loops</option>
                <option>Numerical data types – range and size (number of bits) of Java primitive data types</option>
                <option>Operator precedence rules</option>
                <option>Passing arrays to methods (different from passing primitives) </option>
                <option>Primitive data types in Java</option>
                <option>Random number generation with Math.random() method</option>
                <option>Reading Strings from console</option>
                <option>Reading numerical values and strings from command-line arguments</option>
                <option>Relational operations and operators, boolean data type</option>
                <option>Returning arrays from methods</option>
                <option>Rules of precedence for arithmetic operators.</option>
                <option>Searching and sorting operations</option>
                <option>Selection Sort - algorithm and code</option>
                <option>String to numbers and vice versa</option>
                <option>String type, java.lang.String class</option>
                <option>Sub-string methods</option>
                <option>Switch statements</option>
                <option>Type casting, explicit and implicit casting</option>
                <option>Variable length arguments in methods</option>
                <option>Variable names, variable types. </option>

                <option disabled style="font-weight: bold;background:grey;color:white">CS2</option>
                
                <option>2Dimensional Arrays</option>
                <option>Abstract Data Types (ADTs), examples of ADTs</option>
                <option>Access modifiers. </option>
                <option>ArrayList</option>
                <option>ArrayList, LinkedList, Vector and Stack classes in JDK. </option>
                <option>Arrays.sort() and Collections.sort() methods</option>
                <option>Boxing, unboxing, autoboxing, autounboxing</option>
                <option>Bubble Sort. </option>
                <option>Circular Queue. </option>
                <option>Classes, Fields and Methods</option>
                <option>Command line options for increased heap allocation for JVM) </option>
                <option>Comparable<E> interface and compareTo() method</option>
                <option>Creating Objects from classes, instantiation</option>
                <option>Data hiding. Getter and setter methods</option>
                <option>Dynamic Binding</option>
                <option>Equality of objects, equals() method</option>
                <option>Exception handling in Java. Throwing and catching exceptions, </option>
                <option>Immutable objects. </option>
                <option>Implicit casting</option>
                <option>Inheritance, subclasses and superclasses</option>
                <option>Instance variables, Instance methods</option>
                <option>Instanceof operator</option>
                <option>Interface</option>
                <option>Interfaces and Abstract classes</option>
                <option>Iterating through a Collection &ltE&gt, Iterator&ltE&gt interface</option>
                <option>Iterator() method. </option>
                <option>JDK facilities for sorting arrays and Lists from the Collection classes-</option>
                <option>Java Collection Framework, Collection&ltE&gt interface, Iterable&ltE&gt</option>
                <option>Java File I/O. </option>
                <option>Java packages, Java’s access control mechanism</option>
                <option>LinkedLists – build from scratch using Node objects</option>
                <option>Object arrays, passing Object arrays to and from methods</option>
                <option>Overriding methods in subclasses, overloading vs. overriding</option>
                <option>Polymorphism</option>
                <option>Private, package, protected and public access</option>
                <option>Properties of Linked Lists, operations on Linked Lists</option>
                <option>Queue ADT, implementing a Queue with a fixed capacity array. </option>
                <option>Read data from file by input redirection ( < ) </option>
                <option>Reading from and Writing to files (text only, no binary data) </option>
                <option>Reading from and writing to text files</option>
                <option>Recursion</option>
                <option>Recursive Insertion sort. Merge sort and Quick sort. </option>
                <option>Recursive binary search</option>
                <option>Reference types, Object references</option>
                <option>Running recursive Java programs (-Xmx and -Xss) </option>
                <option>Sorting Algorithms, Selection and Insertion sort</option>
                <option>Static variables, static methods</option>
                <option>Static vs. instance methods and dynamic binding</option>
                <option>The Stack ADT, implementing a Stack with a fixed capacity array. </option>
                <option>The “is a” relationship in inheritance</option>
                <option>Try-catch clauses. Finally clause. </option>
                <option>Type-safety, generics(brief) </option>
                <option>“this” keyword as object reference</option>
                <option>Upcasting, downcasting</option>
                <option>Use of this() for constructor calls</option>
                <option>Using Constructors and the new keyword</option>
                <option>Wrapper classes for primitive data types. </option>

                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"style="font-size:15px;font-weight:bold">Subject:</label>
                <input style="font-size:15px"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Describe your question briefly (100 characters max)" maxlength="100" name="point"  required="required">
            </div>
            <div class="form-group">
              <label for="comment"style="font-size:15px;font-weight:bold">Question:</label>
              <textarea style="font-size:15px"placeholder="Enter question here (10,000 characters max)" class="form-control" rows="10" id="comment" required="required" name = "data" maxlength="10000"></textarea>
            </div>
 
              <button type="submit" class="btn btn-primary btn-md"style="font-size:15px">Submit</button>

            </form> 
          </div>
       </div> 
     
<?php include 'footer.php';?>

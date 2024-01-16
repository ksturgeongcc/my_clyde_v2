<?php 
    $studentNum = $_GET['student_num'];
    include '../../config/config.php';
    include '../../partials/Header.php';
    $student = $conn->prepare("SELECT 
    s.firstname,
    s.surname,
    s.email,
    s.address,
    s.postcode,
    s.dob,
    c.course_id,
    c.name,
    c.award,
    c.year
    FROM student s
    LEFT JOIN course c ON s.fk_course = c.course_id

    where s.student_num = $studentNum
    ");
    $student->execute();
    $student->store_result();
    $student->bind_result($firstname, $surname, $email, $address, $postcode, $dob, $course_id, $course, $award, $term);
    $student->fetch();    


// call all course names

    $courseList = $conn->prepare("SELECT
    course_id,
    name
    
    from course");
     $courseList->execute();
     $courseList->store_result();
     $courseList->bind_result($courseId, $courseName);
      
    ?>

    <!-- component -->
<div class="flex bg-gray-100">
   <div class="m-auto">
      <div>
         <button onclick="window.location.href='<?= BASE_PATH ?>queries/deleteStudent.php?student_num=<?= $studentNum ?>';"  type="button" class="relative w-full flex justify-center items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-900  focus:outline-none   transition duration-300 transform active:scale-95 ease-in-out">
            <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/></svg>
            <span class="pl-2 mx-1">Delete Student</span>
         </button>
         <div class="mt-5 bg-white rounded-lg shadow">
            <div class="flex">
               <div class="flex-1 py-5 pl-5 overflow-hidden">
                  <svg class="inline align-text-top" height="24px" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                     <g>
                        <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none" id="svg_1" stroke="null"></path>
                        <path d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z" id="svg_2"></path>
                        <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                     </g>
                  </svg>
                  <h1 class="inline text-2xl font-semibold leading-none">Student Details</h1>
               </div>
            </div>
            <form action="../../queries/student_update.php?student_num=<?= $studentNum ?>" method="post">
               <div class="px-5 pb-5">
                  <div class="flex">
                     <div class="flex-grow w-1/4 pr-2"><input  name="firstname" value="<?= $firstname ?>" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                     <div class="flex-grow"><input name="surname" value="<?= $surname ?>" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                  </div>
                  <input  value="<?= $studentNum ?>" disabled class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                  <input  value="<?= $email ?>" name="email" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"> 
                  <input  value="<?= $address ?>" name="address" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">              
                  <div class="flex">
                     <div class="flex-grow w-1/4 pr-2"><input name="postcode" value="<?= $postcode ?>" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                     <div class="flex-grow"><input disabled value="<?= $dob ?>" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                  </div>
                  <select name="fk_course" id="">
                     <option value="<?= $course_id ?>"><?= $course ?></option>                 
                     <?php while($courseList->fetch()) : ?>
                     <option value="<?= $courseId ?>"><?= $courseName ?></option>
                     <?php endwhile ?>
                  </select>
               </div>
               <div class="flex flex-row-reverse p-3">
                  <div class="flex-initial pl-3">
                     <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z" opacity=".3"></path>
                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"></path>
                        </svg>
                        <span class="pl-2 mx-1">Save</span>
                     </button>
                  </div>           
               </div>
               <hr class="mt-4">
               <div class="flex">
                  <div class="flex-1 py-5 pl-5 overflow-hidden">
                     <svg class="inline align-text-top" width="21" height="20.5" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                     <g>
                        <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none" id="svg_1" stroke="null"></path>
                        <path d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z" id="svg_2"></path>
                        <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                     </g>
                     </svg>
                     <h1 class="inline text-2xl font-semibold leading-none">Enrol on a Unit</h1>
                  </div>
                  <div class="flex-none pt-2.5 pr-2.5 pl-1"></div>
               </div>
            </form>
            <form action="../../queries/student_update.php?student_num=<?= $studentNum ?>" method="post">
               <div class="px-5 pb-5">
                  <input  value="unit Name" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                  <input  value="unit Description" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
               </div>
               <div class="flex flex-row-reverse p-3">
                  <div class="flex-initial pl-3">
                     <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z" opacity=".3"></path>
                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"></path>
                        </svg>
                        <span class="pl-2 mx-1">Save</span>
                     </button>
                  </div>            
               </div>
            </form>    
         </div>
      </div>
   </div>
</div>
<?php include '../../partials/Footer.php'; ?>
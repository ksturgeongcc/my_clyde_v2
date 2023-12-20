<?php
	include '../config/config.php';
    include '../partials/Header.php';
?>
<!-- component -->
<!-- Create by joker banny -->
<div class="bg-indigo-100 flex justify-center items-center mt-6">
	<div class="lg:w-2/5 md:w-1/2 w-2/3">
		<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="../config/register.php" method="post">
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Student Register</h1>
			<div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="student_num">Student Number</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="tel" name="student_num" id="student_num" placeholder="Student Number" />
            </div>
            <div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="firstname">Firstname</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="firstname" id="firstname" placeholder="firstname" />
            </div>
				<div>
					<label class="text-gray-800 font-semibold block my-3 text-md" for="surname">Surname</label>
					<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="surname" id="surname" placeholder="surname" />
      </div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="email" name="email" id="email" placeholder="email" />
      </div>
      <div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="dob">Date of Birth</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="date" name="dob" id="dob" />
      </div>
      <div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="address">Address</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="address" id="address" placeholder="address" />
      </div>
      <div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="postcode">Postcode</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="postcode" id="postcode" placeholder="postcode" />
      </div>
      <div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="psw" id="password" placeholder="password" />
      </div>
					
            <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
            <!-- <button type="submit" class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Login</button> -->
		</form>
	</div>
</div>
<
<?php include '../partials/footer.php'; ?>
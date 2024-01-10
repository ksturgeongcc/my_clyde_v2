<?php 
    include '../../partials/Header.php'; 
?>
<div class="bg-indigo-100 flex justify-center items-center mt-6">
	<div class="lg:w-2/5 md:w-1/2 w-2/3">
		<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="../../config/add_event.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="added_by" value="<?= $_SESSION['id'] ?>" />
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Student Register</h1>
			<div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="student_num">Event Date</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="datetime-local" name="date" id="date" />
            </div>
            <div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="firstname">Event Description</label>
				<textarea class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"  name="description" id="description" placeholder="firstname"></textarea>
            </div>
				<div>
					<label class="text-gray-800 font-semibold block my-3 text-md" for="surname">Event Image</label>
					<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="file" name="img_path" accept="image/*" />
      </div>
	
					
            <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Add Event</button>
		</form>
	</div>
</div>
<?php 
    include '../../partials/Footer.php'; 
?>
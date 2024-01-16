<?php
    include '../../config/config.php';
    include '../../partials/Header.php';

    $pending = $conn->prepare("SELECT 
    sc.nc_id,
    sc.fk_news_id,
    sc.student_num,
    sc.comment,
    sc.active,
    n.title
    FROM student_comment sc
    INNER JOIN news n ON sc.fk_news_id = n.news_id
    where sc.active = 0
    ");
    $pending->execute();
    $pending->store_result();
    $pending->bind_result($nc_id, $fk_news_id, $student_num, $comment, $active, $title);

?>

<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

<!-- ====== Cards Section Start -->
<section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
   <div class="container">
      <div class="flex flex-wrap -mx-4">
      <?php if ($pending->num_rows == 0): ?>
        <p>There are no comment waiting on approval</p>
        <?php else : ?>
      <?php while($pending->fetch()) : ?>
       

         <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10">
               <img
                  src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg"
                  alt="image"
                  class="w-full"
                  />
               <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                  <h3>
                     <a
                        href="javascript:void(0)"
                        class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        "
                        >
                        <?= $title ?>
                    </a>
                  </h3>
                  <p class="text-base text-body-color leading-relaxed mb-7">
                    <?= $comment ?>
                  </p>
                  <button data-modal-target="myModal<?= $nc_id ?>" onclick="openModal(this)" class='bg-blue-500 text-white p-2 rounded text-2xl font-bold'>Open Modal</button>

               </div>
            </div>
         </div>
                
         <!-- Modal Container -->
         <div id="myModal<?= $nc_id ?>" class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
            style="background: rgba(0,0,0,.9); display: none;">
            <div
                class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold"><?= $title ?></p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                    <div class="my-5">
                        <p><?= $comment ?></p>
                    </div>
                    <!--Footer-->
                    
                    <div class="flex justify-end pt-2">
                        <button 
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                        <button
                        onclick="window.location.href='<?= BASE_PATH ?>queries/approve.php?nc_id=<?= $nc_id ?>';"
                            class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
      <?php endwhile ?>
      <?php endif ?>

      </div>
   </div>
</section>
<script>
    function openModal(button) {
        const modalId = button.getAttribute('data-modal-target');
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
        } else {
            console.error(`Modal with ID "${modalId}" not found.`);
        }
    }

    const modalClose = (modalId) => {
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        } else {
            console.error(`Modal with ID "${modalId}" not found.`);
        }
    }

    window.onclick = function (event) {
        const modal = event.target.closest('.main-modal');
        if (modal) modalClose(modal.id);
    }
</script>
<?php include '../../partials/footer.php'; ?>



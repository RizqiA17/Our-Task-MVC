<!-- Solo Content -->
<div class="px-9 py-4 max-w-[calc(100vw_-_223px)] max-[720px]:max-w-[100vw]" id="content-solo">

    <!-- Complited Solo -->
    <div class="" id='content-solo'>
        <!-- Title -->
        <div class="flex items-center justify-between w-full h-12 text-2xl font-normal base-100">
            <h3 class="text-xl font-semibold dark:text-100">Complited Solo Project</h3>
            <div class="flex">
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-1',-1)">
                    <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class=" stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-1',1)">
                    <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class=" stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="relative flex flex-row max-w-full gap-6 pb-2 overflow-hidden overflow-y-auto min-h-36 max-h-80" id="scroll-1">

            <!-- Items -->

            <?php
            $total = 0;
            foreach ($data['task_solo'] as $task) {
                if ($task['progress'] == 'finish') {
                    $total++;
            ?>
                    <a href="<?= BASEURL ?>solo/detail/<?= $task['id_task'] ?>" class="w-full min-w-64 max-w-64 bg-white dark:bg-700 shadow-md rounded-2xl grow sm:w-96 h-36" id="<?= $task['id_task'] ?>">
                            <!-- Top -->
                            <div class=" mt-6 pb-3 mx-6 flex-grow border-b border-100 dark:border-500">
                                <h3 class=" text-lg font-bold font-sans line-through">
                                    <?= $task['name'] ?>
                                    <p class=" font-normal text-sm">
                                        <?= $task['mapel'] ?>
                                    </p>
                                </h3>
                            </div>

                            <!-- Deadline -->
                            <div class=" mt-4 flex items-center font-extralight text-xs mx-6 ">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="#71839B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="ml-3 font-normal text-xs">
                                    <?= $task['tgl_deadline'] ?>
                                </p>
                            </div>
                        </a>
                <?php
                }
            }
            if ($total == 0) { ?>
                <div class="flex items-center justify-center w-full text-5xl font-bold text-center text-700">No Task Complited</div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Group Content -->
<div class="box-border py-4 px-9" id="content">

    <!-- Complited Group -->
    <div id="content-group">

        <!-- Title -->
        <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
            <h3 class="text-xl font-semibold dark:text-100">Complited Group</h3>
            <div class="flex">
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-2',-1)">
                    <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-2',1)">
                    <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-2">

            <!-- Items -->
            <?php
            $total = 0;
            foreach ($data['tugas_group'] as $task) {
                $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                $selesai = (int) $task['progress'];
                if ($selesai >= 100) {
                    $total++;
            ?>
                    <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                        <form action="Group/getDetail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>

                        <!-- Top Items -->
                        <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                            <div class="p-4">
                                <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                    <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                </h3>
                            </div>
                        </div>

                        <!-- Bottom Items -->
                        <div class="box-border w-48 px-5 py-4">
                            <?php
                            if ($task['id_leader'] != null) {
                            ?>

                                <!-- Presentage -->
                                <h3 class="text-sm font-semibold">
                                    <?= $task['progress'] ?>%
                                </h3>

                                <!-- Presentage Bar -->
                                <div class="flex flex-row items-center justify-between">

                                    <!-- Bar -->
                                    <div class="h-0.5 w-25 bg-gray-200 dark:bg-gray-500 mr-5">
                                        <div class="h-0.5 from-gradient-1-start to-gradient-1-end gradient bg-gradient-to-r" style="width: <?= $task['progress'] ?>px;"></div>
                                    </div>

                                    <!-- Member Total -->
                                    <div class="flex flex-row justify-center flex-grow">
                                            <?php
                                            $memberTotal = 0;
                                            $is_lot = false;
                                            foreach ($data['group_member'] as $member) {
                                                if ($member['id_task'] == $task['id_task'] && $member['id_profile_leader'] == $task['id_profile_leader']) {
                                                    if ($memberTotal < 5) {
                                                        $memberTotal++; ?>
                                                        <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                    <?php } else if ($memberTotal >= 5) {
                                                        $memberTotal++;
                                                        $is_lot = true; ?>
                                                <?php }
                                                }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark">&plus;<?= $memberTotal -= 5 ?></div>
                                            <?php } ?>
                                        </div>
                                </div>
                            <?php } else echo "Belum masuk Group" ?>
                        </div>
                    </a>
                <?php
                }
            }
            if ($total == 0) { ?>
                <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task Complited</div>
            <?php } ?>
        </div>
    </div>

    <!-- Almost Complited -->
    <div id="content-group2">

        <!-- Title -->
        <div class="flex items-center justify-between w-full h-12 text-2xl font-normal ">
            <h3 class="text-xl font-semibold dark:text-100">Almost Complited</h3>
            <div class="flex">
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-3',-1)">
                    <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="cursor-pointer stroke-700 dark:stroke-50" d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-3',1)">
                    <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="cursor-pointer stroke-700 dark:stroke-50" d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col flex-wrap justify-start relative h-40 gap-6 min-[550px]:flex-row row-task" id="scroll-3">

            <!-- Items -->
            <?php
            $total = 0;
            foreach ($data['tugas_group'] as $task) {
                $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat'])));
                $selesai = (int) $task['progress'];
                if ($selesai >= 80 && $selesai < 100) {
                    $total++;
            ?>
                    <a href="<?= BASEURL ?>group/detail/<?= $task['id_task'] ?>" class="relative w-48 bg-white shadow-md rounded-2xl h-36 dark:bg-700">
                        <form action="Group/getDetail" method="post" id="form-<?= $task['id_task'] ?>"><input type="hidden" id="task-<?= $task['id_task'] ?>" name="idtask" value="<?= $task['id_task'] ?>"></form>

                        <!-- Top Items -->
                        <div class="w-full h-20 rounded-t-2xl from-base-500 to-second-500 bg-gradient-to-r">
                            <div class="p-4">
                                <h3 class="text-base font-medium text-white "><?= $task['mapel'] ?>
                                    <p class="text-xs font-normal "><?= $task['name'] ?></p>
                                </h3>
                            </div>
                        </div>

                        <!-- Bottom Items -->
                        <div class="box-border w-48 p-4">
                            <?php
                            if ($task['id_leader'] != null) {
                            ?>

                                <!-- Presentage -->
                                <h3 class="text-sm font-semibold">
                                    <?= $task['progress'] ?>%
                                </h3>

                                <!-- Presentage Bar -->
                                <div class="flex flex-row items-center justify-between">

                                    <!-- Bar -->
                                    <div class="h-0.5 w-25 bg-gray-200 dark:bg-gray-500 mr-5">
                                        <div class="h-0.5 from-gradient-1-start to-gradient-1-end gradient bg-gradient-to-r" style="width: <?= $task['progress'] ?>px;"></div>
                                    </div>

                                    <!-- Member Total -->
                                    <div class="flex flex-row justify-center flex-grow">
                                            <?php
                                            $memberTotal = 0;
                                            $is_lot = false;
                                            foreach ($data['group_member'] as $member) {
                                                if ($member['id_task'] == $task['id_task'] && $member['id_profile_leader'] == $task['id_profile_leader']) {
                                                    if ($memberTotal < 5) {
                                                        $memberTotal++; ?>
                                                        <img src="<?= BASEURL ?>image/Profil.png" alt="" class="rounded-full size-5 -ml-2.5 ">
                                                    <?php } else if ($memberTotal >= 5) {
                                                        $memberTotal++;
                                                        $is_lot = true; ?>
                                                <?php }
                                                }
                                            }
                                            if ($is_lot) { ?>
                                                <div class="rounded-full w-5 h-5 -ml-2.5 relative text-xs text-center font-light flex justify-center items-center dark:bg-bg-dark">&plus;<?= $memberTotal -= 5 ?></div>
                                            <?php } ?>
                                        </div>
                                </div>
                            <?php } else echo "Belum masuk Group" ?>
                        </div>
                    </a>
                <?php
                }
            }
            if ($total == 0) { ?>
                <div class="flex items-center justify-center w-full h-full text-5xl font-bold text-center text-700">No Task</div>
            <?php } ?>
        </div>
    </div>

</div>

<!-- <div class="flex-grow dark:bg-bg-dark">
    <div class="box-border py-4 px-9" id="content-solo">
        <div class="sort-by top">
            <div class="text-xl font-semibold dark:text-slate-100">Complated Solo Project</div>
            <div class="arrow">
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-1',-1)">
                    <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class=" cursor-pointer" onclick="scrollContainer('scroll-1',1)">
                    <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-1">
            <?php
            foreach ($data['task_solo'] as $task) {
                if ($task['progress'] != 'unfinished') {
            ?>
                    <div class="solo list" onclick="pathFind('solo/detail')">
                        <div class="plain">
                            <div class="info">
                                <div class="task work-sans task-down"><?= $task['name'] ?></div>
                                <div class="mapel work-sans"><?= $task['mapel'] ?></div>
                            </div>
                            <div class="deadline work-sans">
                                <div class="logo">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5V4.5M6 0.5V4.5M17.4826 9.5H0.517334M17.4826 9.5C17.2743 3.79277 15.154 2 9 2C2.84596 2 0.725603 3.79277 0.517334 9.5M17.4826 9.5C17.4943 9.82084 17.5 10.154 17.5 10.5C17.5 17 15.5 19 9 19C2.5 19 0.5 17 0.5 10.5C0.5 10.154 0.505626 9.82084 0.517334 9.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <?= $task['tgl_deadline'] ?>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            <?php

            } ?>
        </div>
    </div>
    <div class="box-border py-4 px-9">
        <div class="" id="content-group">
            <div class="sort-by top">
                <div class="text-xl font-semibold dark:text-slate-100">Complated Group Project</div>
                <div class="arrow">
                    <span class=" cursor-pointer" onclick="scrollContainer('scroll-3',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class=" cursor-pointer" onclick="scrollContainer('scroll-3',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <script>
                var hide2 = true;
            </script>
            <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-3">
                <?php
                foreach ($data['tugas_group'] as $task) {
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat_group'])));
                    $selesai = (int) $task['status_selesai'];
                    if ($selesai >= 100) {
                ?>
                        <script>
                            hide2 = false;
                        </script>
                        <div class="list" onclick="window.location.href='Task-group'">
                            <div class="group gradient-1">
                                <div class="group-inner-text">
                                    <div class="mapel2 poppins"><?= $task['mapel'] ?></div>
                                    <div class="task-remaining poppins"><?= $task['nama_tugas_group'] ?></div>
                                </div>
                            </div>
                            <div class="bottom-group">
                                <div class="percentage poppins"><?= $task['status_selesai'] ?></div>
                                <div class="progress-member">
                                    <div class="progress-bar-empty">
                                        <div class="progress-bar gradient-1" style="width: 100px;"></div>
                                    </div>
                                    <div class="member">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <div class="ellipse poppins">+8</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            if (!hide2) {
                                var content = document.getElementById('content-group');
                                content.classList.remove('hide');
                            }
                        </script>
                    <?php
                    } else { ?>
                        <script>
                            if (hide2) {
                                var content = document.getElementById('content-group');
                                content.classList.add('hide');
                            }
                        </script>
                <?php }
                } ?>
            </div>
        </div>
        <div class="" id="content-group2">
            <div class="sort-by top">
                <div class="text-xl font-semibold dark:text-slate-100">Almost Complated Group Project</div>
                <div class="arrow">
                    <span class=" cursor-pointer" onclick="scrollContainer('scroll-2',-1)">
                        <svg class="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class=" cursor-pointer" onclick="scrollContainer('scroll-2',1)">
                        <svg class="arrow-right" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.90997 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.90997 4.08002" stroke="#141522" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </div>
            <script>
                var hide3 = true;
            </script>
            <div class="flex flex-col relative gap-6 min-[550px]:flex-row row-task" id="scroll-2">
                <?php
                foreach ($data['tugas_group'] as $task) {
                    $dibuat = new DateTime(date('Y-m-d H:i:s', strtotime($task['tgl_dibuat_group'])));
                    $selesai = (int) $task['status_selesai'];
                    if ($selesai >= 90) {
                ?>
                        <script>
                            hide3 = false;
                        </script>
                        <div class="list" onclick="window.location.href='Task-group'">
                            <div class="group gradient-1">
                                <div class="group-inner-text">
                                    <div class="mapel2 poppins"><?= $task['mapel'] ?></div>
                                    <div class="task-remaining poppins"><?= $task['nama_tugas_group'] ?></div>
                                </div>
                            </div>
                            <div class="bottom-group">
                                <div class="percentage poppins"><?= $task['status_selesai'] ?>%</div>
                                <div class="progress-member">
                                    <div class="progress-bar-empty">
                                        <div class="progress-bar gradient-1" style="width: 85px;"></div>
                                    </div>
                                    <div class="member">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <img src="http://localhost/ourtaskmvc/public/image/Profil.png" alt="" class="ellipse">
                                        <div class="ellipse poppins">+8</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            if (!hide3) {
                                var content = document.getElementById('content-group2');
                                content.classList.remove('hide');
                            }
                        </script>
                    <?php
                    } else { ?>
                        <script>
                            if (hide3) {
                                var content = document.getElementById('content-group2');
                                content.classList.add('hide');
                            }
                        </script>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div> -->
</div>
<script src="http://localhost/ourtaskmvc/public/js/script.js"></script>
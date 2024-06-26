<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>css/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Group Project Name</title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="flex relative flex-col m-10 overflow-hidden max-h-[calc(100svh_-_80px)] min-h-[calc(100svh_-_80px)] w-svh bg-50 dark:bg-800">

    <!-- Top -->
    <div class="flex items-center justify-between w-full">
        <a href="<?= BASEURL ?>group" class="w-6 h-6 material-symbols-outlined dark:text-gray-400">keyboard_backspace</a>
        <h1 class="text-xl font-semibold dark:text-gray-400">Group Project</h1>
        <span class="w-6 h-6 material-symbols-outlined dark:text-gray-400"></span>
    </div>

    <?php if ($_SESSION['status'] == 'siswa') : ?>

        <!-- Detail -->
        <?php foreach ($data['task'] as $task) { ?>
            <h2 class="mt-6 mb-6 text-2xl font-bold capitalize dark:text-white"><?= $task['name'] ?></h2>
            <div class="w-full flex max-[712px]:flex-col <?= $data['task'][0]['id_profile_leader'] != null ? 'flex-row' : 'flex-col' ?> gap-6 mb-12">

                <!-- Description -->
                <div class="w-full">
                    <p class="overflow-hidden overflow-y-auto text-slate-600 dark:text-gray-400 max-h-24"><?= $task['description'] ?></p>
                </div>

                <!-- Info Task -->
                <div class="flex flex-row justify-between w-full ">
                    <div class="">
                        <?php if ($data['task'][0]['id_profile_leader'] != null) { ?>
                            <h3 class="font-normal text-slate-400">Assigned to</h3>
                            <div class="flex mt-1 ml-3">
                                <?php
                                foreach ($data['member'] as $member) { ?>
                                    <img src="<?= BASEIMG . $task['pp_name'] ?>" alt="" class="box-border justify-center w-8 h-8 -ml-3 border-2 border-white rounded-full dark:border-bg-dark">
                                <?php } ?>
                                <?php
                                if (sizeof($data['member']) < floor($data['group_lenght']) && $task['id_profile_leader'] == $_SESSION['id']) {
                                ?>
                                    <button class="box-border relative content-center justify-center w-8 h-8 -ml-3 text-xl font-semibold border-2 border-dotted rounded-full bg-100 dark:bg-600 dark:border-white border-bg-dark dark:text-50" onclick="OpenModal(false)">
                                        <span class="m-0.5 material-symbols-outlined">
                                            add
                                        </span>
                                    </button>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class=" font-['Poppins',sans-serif] text-xl font-normal mt-8 text-slate-600 dark:text-gray-400">Your not in any Group, contact your leader group</div>
                        <?php } ?>
                    </div>
                    <div class="">
                        <h3 class="font-normal text-slate-400">Due date</h3>
                        <p class="text-sm dark:text-white">Thursday, 20 July 2023</p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Subtask -->
        <div class="relative overflow-hidden overflow-y-auto grow">
            <div class="flex flex-col gap-4">

                <!-- Subtask Card -->

                <?php if (isset($data['subtask'])) {
                    foreach ($data['subtask'] as $subtask) { ?>
                        <a href="<?= BASEURL . 'group/subtask/' . $subtask['id'] ?>" class="flex justify-between w-full hover:border-base-600 cursor-pointer p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl h-28">
                            <div class="flex flex-col justify-center h-full ">
                                <h3 class="text-xl text-gray-600 dark:text-gray-400">Title Subtask</h3>
                                <div class="flex pt-2.5">
                                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="box-border justify-center w-8 h-8 border-2 border-white rounded-full dark:border-bg-dark ">
                                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="box-border justify-center w-8 h-8 -ml-3 border-2 border-white rounded-full dark:border-bg-dark ">
                                    <img src="<?= BASEURL ?>image/Profil.png" alt="" class="box-border justify-center w-8 h-8 -ml-3 border-2 border-white rounded-full dark:border-bg-dark ">
                                </div>
                            </div>
                            <div class="flex items-center h-full text-gray-600 dark:text-gray-400">
                                <span class="material-symbols-outlined">
                                    Flag
                                </span>
                                25 Hari
                            </div>
                        </a>
                <?php }
                } ?>

            </div>
        </div>
        <?php if ($task['id_profile_leader'] == $_SESSION['id']) { ?>
            <div class="mt-4 bg-inherit">
                <a href="<?= BASEURL ?>group/addtask" class="flex justify-center items-center w-full p-4 border-2 hover:border-base-600 dark:text-50 text-center border-gray-300 co dark:border-gray-600 rounded-xl h-24 cursor-pointer">
                    <span class="m-0.5 material-symbols-outlined">
                        add
                    </span>
                    ADD SUBTASK
                </a>
            </div>
        <?php
        }

        if (sizeof($data['member']) < floor($data['group_lenght']) && $task['id_profile_leader'] == $_SESSION['id']) {
        ?>
            <!-- Main modal -->
            <div id="modal" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  bg-[rgba(0,0,0,0.5)]">
                <div class="relative px-4 w-full  max-w-full min-h-svh max-h-full">
                    <!-- Modal content -->
                    <div id="modal-content" class="relative transition-all -translate-y-full opacity-0 duration-150 ease-linear bg-white rounded-lg shadow max-w-3xl dark:bg-700 my-9 mx-auto">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add Member
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-base-600 dark:hover:text-white" onclick="OpenModal(true)">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="<?= BASEURL ?>group/addMember" method="post">
                            <div class="p-2  h-[60svh]">
                                <input type="hidden" name="addMember" id="addMemberValue" value="">
                                <div class="h-full px-5">
                                    <div class="grid gap-3 grid-cols-[repeat(auto-fit,_minmax(270px,1fr))] h-full overflow-hidden overflow-y-auto">
                                        <?php foreach ($data['notmember'] as $getmember) { ?>
                                            <div class="gap-2.5 items-center items-center flex justify-between dark:text-50">
                                                <div class="flex gap-1">
                                                    <img src="<?= BASEIMG . $getmember['pp_name'] ?>" class="size-5" alt="">
                                                    <?= $getmember['name'] ?>
                                                </div>
                                                <input onchange="totalAddMember(<?= $getmember['id_profile'] ?>)" type="checkbox" class="" name="membernogroup" value="<?= $getmember['id_profile'] ?>" id="<?= $getmember['id_profile'] ?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button onclick="getValue()" type="submit" class=" w-32 text-white bg-base-500 hover:bg-base-600 focus:ring-4 focus:outline-none focus:ring-base-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-base-500 dark:hover:bg-base-600 dark:focus:ring-base-800">Add Member</button>
                                <button data-modal-hide="default-modal" type="button" class="w-32 py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-100 hover:bg-50 hover:text-base-500 focus:z-10 focus:ring-4 focus:ring-500 dark:focus:ring-500 dark:bg-base-800 dark:text-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-600" onclick="OpenModal(true)">Decline</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    <?php else : $task = $data['task']; ?>

        <div class="flex mt-10 gap-4 w-full flex-wrap dark:text-50">

            <!-- Detail -->
            <div class=" min-h-48 flex-grow flex flex-col justify-center bg-inherit border border-gray-200 dark:border-slate-600 p-5 rounded-2xl">
                <h2 class=" font-semibold text-2xl w-full uppercase">
                    <?= $task['name'] ?>
                </h2>
                <h3 class="mt-6">
                    Description
                    <p class=" px-3 text-gray-400">
                        <?= $task['description'] ?>
                    </p>
                </h3>
                <div class="flex flex-row justify-between gap-5 mt-3">
                    <h3 class="">
                        Deadline
                        <p class=" font-semibold text-md text-gray-400 pl-3">
                            <?= $task['tgl_deadline'] ?>
                        </p>
                    </h3>
                </div>
            </div>

            <!-- Attachment for Student -->

            <div class=" rounded-2xl p-5 w-full flex-grow md:max-w-96 border border-gray-200 dark:border-slate-600" id="attachments">
                <div class="flex">
                    <div class=" p-2 w-36 text-center rounded-2xl cursor-pointer hover:bg-gray-200 ease-in-out hover:text-black transition-colors delay-75" onclick="AddAttachments()">Attachments</div>
                    <?php if (($_SESSION['status'] == 'guru' && $task['task_description_file'] == null) || $_SESSION['status'] == 'siswa') : ?>
                        <div class=" ml-1 p-2 w-36 text-center rounded-2xl cursor-pointer hover:bg-gray-200 ease-in-out hover:text-black transition-colors delay-75" onclick="Attachment()">Add attachment</div>
                    <?php endif; ?>
                </div>

                <!-- Attachment Task -->
                <div id="attachment" class="">
                    <?php
                    if ($task['task_description_file'] != null) {
                    ?>
                        <div class="mt-5 flex items-center">
                            <a href="<?= BASEIMG . $task['task_description_file'] ?>" class="w-16 h-16 bg-green-600 rounded-lg flex justify-center items-center overflow-hidden" target="_blank">
                                <img src="<?= BASEURL ?>image/<?= $task['task_description_file'] ?>" alt="">
                            </a>
                            <div style="margin-left: 10px;">
                                <a href="<?= BASEIMG . $task['task_description_file'] ?>" target="_blank">Task Attachments</a>
                                <div class=" text-gray-400 text-xs">Added <?= date('M j ', strtotime($task['tgl_dibuat'])) . 'at ' . date('g:m A', strtotime($task['tgl_dibuat'])) ?></div>
                            </div>
                        </div>
                        <?php } ?>
                </div>

                <!-- Add Attachment -->
                <form action="<?= BASEURL ?>group/upload" method="post" enctype="multipart/form-data">
                    <div class="mt-5 flex hidden flex-col gap-2" id="add">
                        <div class="flex max-sm:gap-2 max-sm:flex-col flex-row gap-8 items-center">
                            <input type="text" id="attachment-note" class="h-5 dark:bg-gray-700 box-border h-8 w-full outline-none border dark:border-slate-600 rounded-md text-sm p-1 " name="name" placeholder="Title">
                            <input type="file" name="image" id="image attachment-file" class=" w-full text-center text my-2">
                        </div>
                        <button type="submit" name="proses" id="attachment-submit" class="bg-own-blue rounded-lg h-7 w-full border-none text-white cursor-pointer" onclick="AttachmentInput()">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <script>
        let attachment = document.getElementById('attachment');
        let addAttachments = document.getElementById('add');

        function Attachment() {
            attachment.classList.add("hidden");
            addAttachments.classList.remove("hidden");
        }

        function AddAttachments() {
            attachment.classList.remove("hidden");
            addAttachments.classList.add("hidden");
        }

        function OpenModal(isOpen) {
            if (isOpen) {
                document.getElementById('modal-content').classList.add('-translate-y-full');
                document.getElementById('modal-content').classList.add('opacity-0');
                setTimeout(() => {
                    document.getElementById('modal').classList.add('hidden');
                }, 100);
            } else {
                setTimeout(() => {
                    document.getElementById('modal-content').classList.remove('-translate-y-full');
                    document.getElementById('modal-content').classList.remove('opacity-0');
                }, 100);
                document.getElementById('modal').classList.remove('hidden');
            }
        }

        let i = <?= sizeof($data['member']); ?>

        function totalAddMember(id) {
            member = id;
            // alert(i)
            if (document.getElementById(id).checked) {
                if (i < Math.floor(<?= $data['group_lenght'] ?>)) {
                    i++
                } else {
                    alert("Anggota telah mencapai batas")
                    document.getElementById(id).checked = false
                }
            } else {
                i--
            }
            // alert(i)
        }

        function getValue() {
            let membernogroup = ''
            // if(document.getElementsByName("membernogroup").length > 0){
            //     alert("berhasil")
            // }
            for (let a = 0; a < document.getElementsByName("membernogroup").length; a++) {
                if (document.getElementsByName("membernogroup")[a].checked) {
                    membernogroup += document.getElementsByName("membernogroup")[a].value + ","
                    // alert(membernogroup)
                    document.getElementById("addMemberValue").value = membernogroup
                }
            }
        }
    </script>

</body>

</html>
/* 
 *      Generate Room Script
 *      Enqueued in Script Service Provider
 *      Loaded on bshb_room post type page.
 *      Contains Add room , Delete Room , Edit room , Sortable methods for the Generate Room fields. 
 *      Contains Ajax call methods and their corresponding Modals for confirmation.
*/

(function ($) {

        'use strict';

        $(document).ready(function () {


                let wasSavingPost = wp.data.select('core/editor').isSavingPost();
                let wasAutosavingPost = wp.data.select('core/editor').isAutosavingPost();
                let wasPreviewingPost = wp.data.select('core/editor').isPreviewingPost();
                wp.data.subscribe(function () {


                        const isSavingPost = wp.data.select('core/editor').isSavingPost();
                        const isAutosavingPost = wp.data.select('core/editor').isAutosavingPost();
                        const isPreviewingPost = wp.data.select('core/editor').isPreviewingPost();
                        const hasActiveMetaBoxes = wp.data.select('core/edit-post').hasMetaBoxes();


                        // Save metaboxes on save completion, except for autosaves that are not a post preview.
                        const shouldTriggerSave = (
                                (wasSavingPost && !isSavingPost && !wasAutosavingPost) ||
                                (wasAutosavingPost && wasPreviewingPost && !isPreviewingPost)
                        );

                        if (hasActiveMetaBoxes && shouldTriggerSave) {
                                $('#bshb-room-field').load(document.URL + ' #bshb-room-field');
                        }


                        // Save current state for next inspection.
                        wasSavingPost = isSavingPost;
                        wasAutosavingPost = isAutosavingPost;
                        wasPreviewingPost = isPreviewingPost;

                });



                // Add a Room Unit Button Click.
                $('body').on('click', '#add-room-unit', function () {
                        $('#add-room-modal').modal('show');
                });
                // Add button inside the Modal. Confirm name and saves the new room.
                $('body').on('click', '#add-modal-button', function () {

                        var roomName = $('#room-name-modal-input').val();
                        var postId = $('#bshb-room-field').data('post-id');
                        if (!roomName) {
                                $('#room-name-modal-input').validate();
                                return;
                        }
                        else {
                                $.post(
                                        ajaxurl,
                                        {
                                                action: 'addRoom',
                                                roomName: roomName,
                                                postId: postId,
                                        },
                                        function (response) {
                                                if (response == true) {
                                                        $('#add-room-modal').modal('hide');
                                                        $('#bshb-room-field').load(document.URL + ' #bshb-room-field');
                                                }
                                        }
                                );
                        }


                });

                // Instantiate the Sortable Container.
                var sortableContainer = document.getElementById('sortable-container');
                var roomSort = new Sortable(sortableContainer, {
                        sort: true,
                        handle: '.sortable-grip', // handle class
                        animation: 300,
                        dataIdAttr: 'data-id',
                        draggable: '.draggable',
                        onSort: function (event, ui) {
                                updateRoomOrder();
                        },
                });
                function updateRoomOrder() {
                        var roomIds = roomSort.toArray();
                        $.post(
                                ajaxurl,
                                {
                                        action: 'updateRoomOrder',
                                        roomIds: roomIds,
                                },
                                function (response) {
                                        console.log("Room Order has been updated.");
                                }
                        );
                }
        });



        // Whenever an Ajax action is finished , Re - instantiate the Sortable Container.
        $('body').ajaxComplete(function () {
                var sortableContainer = document.getElementById('sortable-container');
                var roomSort = new Sortable(sortableContainer, {
                        sort: true,
                        handle: '.sortable-grip', // handle class
                        animation: 300,
                        dataIdAttr: 'data-id',
                        draggable: '.draggable',
                        onSort: function (event, ui) {
                                updateRoomOrder();
                        },
                });
                function updateRoomOrder() {

                        var roomIds = roomSort.toArray();
                        $.post(
                                ajaxurl,
                                {
                                        action: 'updateRoomOrder',
                                        roomIds: roomIds,
                                },
                                function (response) {
                                        console.log("Room Order has been updated.");
                                }
                        );
                }


        });



        // Ajax Delete Room button
        $('body').on('click', '.delete-room-unit', function () {

                var room = $(this).parent().data("room-unit-id");
                var roomName = "#unit-" + room;
                // Confirm delete Modal
                $('#delete-room-modal').modal('show');
                window['deleteRoomId'] = room;
                window['roomName'] = roomName;
        });

        $('body').on('click', '#delete-room', function () {
                var roomId = window['deleteRoomId'];
                var roomName = window['roomName'];
                deleteRoomUnit(roomId, roomName);
        });
        function deleteRoomUnit(roomId, roomName) {
                // RoomAjax.php
                $.post(
                        ajaxurl,
                        {
                                action: 'deleteRoomUnit',
                                roomId: roomId,
                        },

                        function (response) {
                                if (response == true) {
                                        // $(roomName).remove();
                                        $('#delete-room-modal').modal('hide');
                                        $('#bshb-room-field').load(document.URL + ' #bshb-room-field');
                                }

                        });
        }

        // Ajax Update Room name
        $('body').on('click', '.edit-room-unit', function () {
                $('#edit-room-modal').modal('show');
                var editRoomId = $(this).parent().data("room-unit-id");
                window["editRoomId"] = editRoomId;
        });

        $('body').on('click', '#save-room-name', function () {
                var nameInput = $('#edit-name-input');
                var roomName = nameInput.val();
                var roomId = window["editRoomId"];
                if (!roomName) {
                        $('#edit-name-input').validate();
                        return;
                }
                else {
                        // RoomAjax.php
                        $.post(
                                ajaxurl,
                                {
                                        action: 'updateRoomName',
                                        roomName: roomName,
                                        roomId: roomId,
                                },

                                function (response) {
                                        if (response == true) {
                                                $('#bshb-room-field').load(document.URL + ' #bshb-room-field');
                                        }

                                });

                }
        });
})(window.jQuery);
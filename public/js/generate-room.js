/* 
 *      Generate Room Script
 *      Enqueued in Script Service Provider
 *      Loaded on bshb_room post type page.
 *      Contains Add room , Delete Room , Edit room , Sortable methods for the Generate Room fields. 
 *      Contains Ajax call methods and their corresponding Modals for confirmation.
 */

(function ($) {
        'use strict';

        /**
         * Initialize Sortable
         */
        function initializeSortable() {

                var sortableContainer = document.getElementById('sortable-container');
                var roomSort = new Sortable(sortableContainer, {
                        sort: true,
                        handle: '.sortable-grip', // handle class
                        animation: 300,
                        dataIdAttr: 'data-id',
                        draggable: '.draggable',
                        onSort: function (event, ui) {
                                updateRoomOrder(roomSort);
                        },
                });
        }

        /**
         *  Update room order
         * 
         * @param {Sortable} roomSort 
         */
        function updateRoomOrder(roomSort) {

                var roomIds = roomSort.toArray();
                console.log(roomIds);
                $.post(
                        ajaxurl, {
                        action: 'updateRoomOrder',
                        roomIds: roomIds,
                },
                        function (response) {
                                console.log("Room Order has been updated.");
                        }
                );
        }

        /**
         * Add Room Unit
         * 
         * @param {*} postId 
         * @param {*} roomName 
         */
        function addRoomUnit(postId, roomName) {
                $.post(
                        ajaxurl, {
                        action: 'addRoomUnit',
                        roomName: roomName,
                        postId: postId,
                },
                        function (response) {
                                if (response == true) {
                                        $('#bshb-room-field').load(document.URL + ' #bshb-room-field', function () {
                                                initializeSortable();
                                                $('.add-room-spinner').removeClass('is-active');
                                                $('body').removeClass('modal-open');
                                        });
                                }
                        }
                );
        }

        /**
         * Delete Room Unit
         * @param {*} roomId 
         */
        function deleteRoomUnit(roomId) {
                $.post(
                        ajaxurl, {
                        action: 'deleteRoomUnit',
                        roomId: roomId,
                },
                        function (response) {
                                if (response == true) {
                                        $('#bshb-room-field').load(document.URL + ' #bshb-room-field', function () {
                                                $('.delete-room-spinner').removeClass('is-active');
                                                $('body').removeClass('modal-open');
                                                initializeSortable();
                                        });
                                }
                        });
        }

        /**
         * Update Room Unit
         * @param {*} roomName 
         * @param {*} roomId 
         */
        function updateRoomName(roomName, roomId) {
                $.post(
                        ajaxurl, {
                        action: 'updateRoomName',
                        roomName: roomName,
                        roomId: roomId,
                },
                        function (response) {
                                if (response == true) {
                                        $('#bshb-room-field').load(document.URL + ' #bshb-room-field', function () {
                                                $('.save-room-name-spinner').removeClass('is-active');
                                                $('body').removeClass('modal-open');
                                                initializeSortable();
                                        });
                                }
                        });
        }



        /**
         * Document Ready
         */
        $(document).ready(function () {
                // Call Sortable when the page is loaded.
                initializeSortable();

                // Add Room
                $('body').on('click', '#add-room-unit', function () {

                        // Add room Modal
                        $('#add-room-modal').modal('show');
                        var isLoading = false;

                        // Add button inside the Modal. Confirm name and saves the new room.
                        $('body').on('click', '#add-modal-button', function (e) {
                                if (!isLoading) {
                                        var nameInput = $('#room-name-modal-input');
                                        var postId = $('#bshb-room-field').data('post-id');
                                        var roomName = nameInput.val();

                                        if (roomName == "") {
                                                nameInput.addClass('validation-fail');
                                                return;
                                        } else {
                                                isLoading = true;
                                                $('.add-room-spinner').addClass('is-active');
                                                addRoomUnit(postId, roomName);
                                        }
                                }
                        });
                });

                // Delete Room 
                $('body').on('click', '.delete-room-unit', function () {

                        // Confirm delete Modal
                        $('#delete-room-modal').modal('show');
                        var roomId = $(this).parent().data("room-unit-id");

                        $('body').on('click', '#delete-room', function () {
                                $('.delete-room-spinner').addClass('is-active');
                                deleteRoomUnit(roomId);
                        });
                });

                // Edit Room
                $('body').on('click', '.edit-room-unit', function () {
                        var isLoading = false;

                        // Edit Room modal
                        $('#edit-room-modal').modal('show');
                        var roomId = $(this).parent().data("room-unit-id");

                        $('body').on('click', '#save-room-name', function () {
                                if (!isLoading) {
                                        var nameInput = $('#edit_room_name');
                                        var roomName = nameInput.val();
                                        if (roomName == "") {
                                                nameInput.addClass('validation-fail');
                                                return;
                                        } else {
                                                isLoading = true;
                                                $('.save-room-name-spinner').addClass('is-active');
                                                updateRoomName(roomName, roomId);
                                        }
                                }
                        });
                });
        });
})(window.jQuery);

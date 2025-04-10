@extends('layouts.app-pasien')

@section('title', 'MediTalk | Chat')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Konsultasi dengan Dokter</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.pasien') }}" class="text-muted text-hover-primary">Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('konsultasi') }}" class="text-muted text-hover-primary">Konsultasi dengan
                                    Dokter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid order-0 order-lg-1">
                        <div class="card" id="kt_chat_messenger">
                            <div class="card-header" id="kt_chat_messenger_header">
                                <div class="card-title">
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <a href="#"
                                            class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $sesi->dokter->nama }}</a>
                                        <div class="mb-0 lh-1">
                                            @if ($sesi->dokter->status == 'aktif')
                                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">Online</span>
                                            @elseif ($sesi->dokter->status == 'tidak')
                                                <span class="badge badge-light badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">Offline</span>
                                            @else
                                                <span class="badge badge-warning badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">Sibuk</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="kt_chat_messenger_body">
                                <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                                    data-kt-scroll-offset="5px">

                                </div>
                            </div>
                            <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                <form action="{{ route('chat.send') }}" method="post" id="sendMessageForm">
                                    @csrf
                                    <input type="hidden" name="sesi_id" id="sesi_id" value="{{ $sesi->id }}">
                                    <input type="hidden" name="sender_id" id="sender_id" value="{{ Auth::user()->id }}">
                                    <textarea class="form-control mb-3" rows="1" data-kt-element="input" placeholder="Ketik pesan..." name="pesan"
                                        id="messageInput"></textarea>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-2">
                                            <input type="file" style="display:none;" id="inputFile" />
                                            <a href="javascript:document.getElementById('inputFile').click(); ">
                                                <div class="btn btn-sm btn-icon btn-active-light-primary me-1">
                                                    <i class="ki-outline ki-paper-clip fs-3"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <button class="btn btn-primary px-4" type="submit" data-kt-element="send">Kirim
                                            <i class="bi bi-send fs-5 ms-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#sendMessageForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'https://meditalk.catalogrpl.com/public/chat/send',
                    method: 'POST',
                    data: {
                        sesi_id: $('#sesi_id').val(),
                        sender_id: $('#sender_id').val(),
                        pesan: $('#messageInput').val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#messageInput').val('');

                        $('#kt_chat_messenger_body').append(`
                            <div class="message outgoing">
                                <div class="bubble">
                                    ${response.data.pesan}
                                </div>
                            </div>
                        `);

                        $('#kt_chat_messenger_body').scrollTop($('#kt_chat_messenger_body')[0]
                            .scrollHeight);
                    },
                    error: function(xhr) {
                        alert('Gagal mengirim pesan');
                    }
                });
            });
        });
    </script>

    <script>
        function renderMessage(msg, currentUserId) {
            const isSender = msg.sender_id === currentUserId;

            const wrapperClass = `d-flex justify-content-${isSender ? 'end' : 'start'} mb-10`;
            const columnClass = `d-flex flex-column align-items-${isSender ? 'end' : 'start'}`;
            const bubbleClass =
                `p-5 rounded ${isSender ? 'bg-light-primary text-end' : 'bg-light-info text-start'} text-dark fw-semibold mw-lg-400px`;

            const avatar = isSender ?
                `<img alt="Pic" src="{{ asset('images/user.jpg') }}" />` :
                `<img alt="Pic" src="/dokter-avatar.png" />`;

            const header = isSender ?
                `
                <div class="me-3">
                    <span class="text-muted fs-7 mb-1">${msg.created_at}</span>
                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">Anda</a>
                </div>
                <div class="symbol symbol-35px symbol-circle">
                    ${avatar}
                </div>
            ` :
                `
                <div class="symbol symbol-35px symbol-circle">
                    ${avatar}
                </div>
                <div class="ms-3">
                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">${msg.sender_name ?? 'Dokter'}</a>
                    <span class="text-muted fs-7 mb-1">${msg.created_at}</span>
                </div>
            `;

            return `
            <div class="${wrapperClass}">
                <div class="${columnClass}">
                    <div class="d-flex align-items-center mb-2">
                        ${header}
                    </div>
                    <div class="${bubbleClass}" data-kt-element="message-text">
                        ${msg.pesan}
                    </div>
                </div>
            </div>
        `;
        }
    </script>

    <script>
        function loadMessages() {
            $.ajax({
                url: "{{ route('chat.messages', $sesi->id) }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    sesi_id: $('#sesi_id').val(),
                },
                success: function(response) {
                    const chatContainer = $('[data-kt-element="messages"]');
                    chatContainer.html('');

                    response.messages.forEach(function(msg) {
                        chatContainer.append(renderMessage(msg, {{ Auth::user()->id }}));
                    });

                    chatContainer.scrollTop(chatContainer[0].scrollHeight);
                },
                error: function(error) {
                    console.error("Gagal memuat pesan:", error);
                }
            });
        }
    </script>

    {{-- <script>
        fetch('/api/get-messages')
            .then(response => response.json())
            .then(data => {
                console.log(data); // Pastikan data diterima dengan benar
                updateChatUI(data.messages); // Pastikan ada fungsi untuk update tampilan chat
            })
            .catch(error => console.error('Error fetching messages:', error));
    </script> --}}

    {{-- <script>
        $("#sendMessageForm").submit(function(e) {
            e.preventDefault();

            let messageInput = $("#messageInput").val();
            let incoming_id = $("#incoming_id").val();

            if (messageInput.trim() === "") return;

            $.ajax({
                url: "/send-message",
                type: "POST",
                data: {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    message: messageInput,
                    incoming_id: incoming_id,
                },
                success: function() {
                    $("#messageInput").val(""); // Kosongkan input setelah kirim
                    loadMessages(); // Refresh chat
                },
                error: function(error) {
                    console.error("Error sending message:", error);
                },
            });
        });
    </script> --}}
@endsection

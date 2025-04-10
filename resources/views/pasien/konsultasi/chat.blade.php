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
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0 order-1 order-lg-0">
                        <div class="card card-flush">
                            <div class="card-header pt-7" id="kt_chat_contacts_header">
                                <form class="w-100 position-relative" autocomplete="off">
                                    <i
                                        class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"></i>
                                    <input type="text" class="form-control form-control-solid px-13" name="cari"
                                        value="" placeholder="Cari..." />
                                </form>
                            </div>
                            <div class="card-body pt-5" id="kt_chat_contacts_body">
                                <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header"
                                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body"
                                    data-kt-scroll-offset="5px">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px symbol-circle">
                                                <img alt="Pic" src="/demo42/dist/assets/media/avatars/dokter.jpg" />
                                            </div>
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dr.
                                                </a>
                                                <div class="fw-semibold text-muted last-chat">Lorem
                                                    ipsum dolor
                                                    sit
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">04.19</span>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed d-none"></div>
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px symbol-circle">
                                                <img alt="Pic" src="/demo42/dist/assets/media/avatars/dokter.jpg" />
                                            </div>
                                            <div class="ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dr.
                                                    Kayea Alberich Sp.A</a>
                                                <div class="fw-semibold text-muted last-chat">Lorem
                                                    ipsum dolor
                                                    sit amet Lorem ipsum dolor sit amet Lorem ipsum
                                                    dolor sit amet Lorem ipsum dolor sit amet
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">5/2/2025</span>
                                            <span class="badge badge-sm badge-circle badge-light-success">6</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 order-0 order-lg-1 mb-4">
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
                                    <input type="hidden" name="sesi_id" value="{{ $sesi->id }}">
                                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                                    <textarea class="form-control mb-3" rows="1" data-kt-element="input" placeholder="Ketik pesan..."
                                        name="pesan" id="messageInput"></textarea>
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

    <script>
        function loadMessages() {
            $.ajax({
                url: "https://living-salmon-completely.ngrok-free.app/MediTalk/public/chatget",
                type: "POST",
                data: {
                    receiver_id: $("#incoming_id").val()
                },
                success: function(response) {
                    console.log("Respons API:", response); // Debugging

                    let messages = response.messages;
                    let auth_id = response.auth_id;
                    let chatContainer = $('[data-kt-element="messages"]');

                    if (!chatContainer.length) {
                        console.error("Chat container tidak ditemukan!");
                        return;
                    }

                    chatContainer.html(""); // Kosongkan dulu sebelum ditambahkan ulang

                    messages.forEach(function(msg) {
                        let messageHTML = "";

                        if (msg.sender_id == auth_id) {
                            messageHTML = `
                    <div class="d-flex justify-content-end mb-10">
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">${msg.created_at}</span>
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">Anda</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="/path-to-your-avatar.jpg" />
                                </div>
                            </div>
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">
                                ${msg.message}
                            </div>
                        </div>
                    </div>
                    `;
                        } else {
                            messageHTML = `
                    <div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="d-flex align-items-center mb-2">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="/path-to-opponent-avatar.jpg" />
                                </div>
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">${msg.sender_name || "Lawannya"}</a>
                                    <span class="text-muted fs-7 mb-1">${msg.created_at}</span>
                                </div>
                            </div>
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">
                                ${msg.message}
                            </div>
                        </div>
                    </div>
                    `;
                        }

                        chatContainer.append(messageHTML);
                    });

                    console.log("Pesan setelah di-render:", chatContainer.html());

                    chatContainer.scrollTop(chatContainer[0].scrollHeight);
                },
                error: function(error) {
                    console.error("Error fetching messages:", error);
                },
            });
        }

        setInterval(loadMessages, 500);
        loadMessages();
    </script>

    <script>
        fetch('/api/get-messages')
            .then(response => response.json())
            .then(data => {
                console.log(data); // Pastikan data diterima dengan benar
                updateChatUI(data.messages); // Pastikan ada fungsi untuk update tampilan chat
            })
            .catch(error => console.error('Error fetching messages:', error));
    </script>

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

@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Contact</h1>

        <p style="text-align: center; font-style: italic; margin-bottom: 30px; color: #666;">
            Heeft u vragen over onze auto's of wilt u meer informatie? Vul het onderstaande formulier in en wij nemen zo snel mogelijk contact met u op.
        </p>

        {{-- Success bericht --}}
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error berichten --}}
        @if($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Contact formulier --}}
        <div style="background-color: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <form action="{{ route('contact.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;" id="contactForm">
                @csrf
                
                <div>
                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Naam *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           required 
                           minlength="2"
                           maxlength="255"
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;"
                           placeholder="Voer uw volledige naam in">
                    <div class="error-message" id="name-error"></div>
                </div>

                <div>
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Email *
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                    <div class="error-message" id="email-error"></div>
                </div>

                <div>
                    <label for="subject" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Onderwerp *
                    </label>
                    <input type="text" 
                           id="subject" 
                           name="subject" 
                           value="{{ old('subject') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                    <div class="error-message" id="subject-error"></div>
                </div>

                <div>
                    <label for="message" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Bericht *
                    </label>
                    <textarea id="message" 
                              name="message" 
                              required 
                              rows="6"
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical; box-sizing: border-box;">{{ old('message') }}</textarea>
                    <div class="error-message" id="message-error"></div>
                </div>

                <button type="submit" 
                        id="submitBtn"
                        style="background-color: #007bff; color: white; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background-color 0.3s;">
                    📧 Verstuur bericht
                </button>
            </form>
        </div>

        {{-- Contact informatie --}}
        <div style="margin-top: 40px; text-align: center; color: #666;">
            <h3 style="margin-bottom: 15px;">Andere manieren om contact op te nemen</h3>
            <p style="margin: 5px 0;">📞 Telefoon: +31 6 12345678</p>
            <p style="margin: 5px 0;">📧 Email: info@carintrest.com</p>
            <p style="margin: 5px 0;">📍 Adres: Autostraat 123, 1234 AB Amsterdam</p>
        </div>
    </div>

    <style>
        button[type="submit"]:hover {
            background-color: #0056b3 !important;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        
        .input-error {
            border-color: #dc3545 !important;
            background-color: #fff5f5 !important;
        }
        
        .input-success {
            border-color: #28a745 !important;
            background-color: #f8fff9 !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const nameField = document.getElementById('name');
            const emailField = document.getElementById('email');
            const subjectField = document.getElementById('subject');
            const messageField = document.getElementById('message');
            const submitBtn = document.getElementById('submitBtn');

            // Real-time validation
            nameField.addEventListener('input', validateName);
            emailField.addEventListener('input', validateEmail);
            subjectField.addEventListener('input', validateSubject);
            messageField.addEventListener('input', validateMessage);

            // Form submission validation
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                }
            });

            function validateName() {
                const value = nameField.value.trim();
                const errorElement = document.getElementById('name-error');
                
                if (value.length < 2) {
                    showError(nameField, errorElement, 'Naam moet minimaal 2 karakters bevatten');
                    return false;
                } else if (value.length > 255) {
                    showError(nameField, errorElement, 'Naam mag maximaal 255 karakters bevatten');
                    return false;
                } else if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
                    showError(nameField, errorElement, 'Naam mag alleen letters en spaties bevatten');
                    return false;
                } else {
                    showSuccess(nameField, errorElement);
                    return true;
                }
            }

            function validateEmail() {
                const value = emailField.value.trim();
                const errorElement = document.getElementById('email-error');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(value)) {
                    showError(emailField, errorElement, 'Voer een geldig e-mailadres in');
                    return false;
                } else {
                    showSuccess(emailField, errorElement);
                    return true;
                }
            }

            function validateSubject() {
                const value = subjectField.value.trim();
                const errorElement = document.getElementById('subject-error');
                
                if (value.length < 3) {
                    showError(subjectField, errorElement, 'Onderwerp moet minimaal 3 karakters bevatten');
                    return false;
                } else if (value.length > 255) {
                    showError(subjectField, errorElement, 'Onderwerp mag maximaal 255 karakters bevatten');
                    return false;
                } else {
                    showSuccess(subjectField, errorElement);
                    return true;
                }
            }

            function validateMessage() {
                const value = messageField.value.trim();
                const errorElement = document.getElementById('message-error');
                
                if (value.length < 10) {
                    showError(messageField, errorElement, 'Bericht moet minimaal 10 karakters bevatten');
                    return false;
                } else if (value.length > 1000) {
                    showError(messageField, errorElement, 'Bericht mag maximaal 1000 karakters bevatten');
                    return false;
                } else {
                    showSuccess(messageField, errorElement);
                    return true;
                }
            }

            function showError(field, errorElement, message) {
                field.classList.add('input-error');
                field.classList.remove('input-success');
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }

            function showSuccess(field, errorElement) {
                field.classList.remove('input-error');
                field.classList.add('input-success');
                errorElement.style.display = 'none';
            }

            function validateForm() {
                const isNameValid = validateName();
                const isEmailValid = validateEmail();
                const isSubjectValid = validateSubject();
                const isMessageValid = validateMessage();
                
                const isValid = isNameValid && isEmailValid && isSubjectValid && isMessageValid;
                
                if (isValid) {
                    submitBtn.textContent = '📧 Bezig met versturen...';
                    submitBtn.disabled = true;
                }
                
                return isValid;
            }
        });
    </script>
        }
    </style>
@endsection

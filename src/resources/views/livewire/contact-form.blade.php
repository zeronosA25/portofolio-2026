<div>
    @if ($success)
        <div style="margin-bottom: 16px; color: #16a34a;">
            Pesan berhasil dikirim.
        </div>
    @endif

    <form wire:submit.prevent="submit" class="contact-form fade-in">
        <div class="form-row">
            <div class="form-group">
                <label for="contact-name">Name</label>
                <input type="text" id="contact-name" wire:model="name" placeholder="Your full name">
                @error('name') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="contact-email">Email</label>
                <input type="email" id="contact-email" wire:model="email" placeholder="your.email@example.com">
                @error('email') <small style="color: red;">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="contact-subject">Subject</label>
            <input type="text" id="contact-subject" wire:model="subject" placeholder="What's this about?">
            @error('subject') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="contact-message">Message</label>
            <textarea id="contact-message" wire:model="message" rows="6" placeholder="Tell me about your project..."></textarea>
            @error('message') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="submit-btn">
            Send Message
        </button>
    </form>
</div>

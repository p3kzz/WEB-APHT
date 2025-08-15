<?php

namespace App\Notifications;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PengajuanStatusNotification extends Notification
{
    use Queueable;
    public $pengajuan;
    /**
     * Create a new notification instance.
     */
    public function __construct(Pengajuan $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pembaruan Status Pengajuan')
            ->view('emails.pengajuan_status', [
                'pengajuan' => $this->pengajuan
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pengajuan_id' => $this->pengajuan->id,
            'unit_usaha' => $this->pengajuan->unit_usaha,
            'status' => $this->pengajuan->status,
            'komentar' => $this->pengajuan->komentar,
            'message' => 'Status pengajuan Anda untuk unit usaha "' . $this->pengajuan->unit_usaha . '" telah diperbarui menjadi ' . $this->pengajuan->status . '.'
        ];
    }
}

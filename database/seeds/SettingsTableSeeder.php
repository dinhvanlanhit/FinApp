<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                  'company_name'=>'Fin App',
                  'title'=>'Fin - App',
                  'logo'=>'logofinapp.png',
                  'icon' => 'icon.jpg',
                  'googleMap'=>'<iframe width="100%" height="250" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1951.5707501119275!2d108.4395018081761!3d11.964703521821205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1593161745604!5m2!1svi!2s" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false" tabindex="0"></iframe>',
                  'address' => '138  Lý Nam Đế  - Thành Phố Đà Lạt',
                  'email'=>'finapp.fun@gmail.com',
                  'password'=>'0966334404',
                  'phone_number'=>'0966334404',
                  'date'=>'2020-6-10',
                  'themes'=>'[]',
                  'content_banktransfer'=>'<p><strong>Th&ocirc;ng tin thanh to&aacute;n:</strong>&nbsp;</p>
                  <p><span>Thanh to&aacute;n bằng h&igrave;nh thức chuyển khoản ATM hoặc ủy nhiệm chi.&nbsp;</span><span>Qu&yacute; kh&aacute;ch c&oacute; thể chuyển khoản v&agrave;o c&aacute;c t&agrave;i khoản sau, bằng c&aacute;ch ra ng&acirc;n h&agrave;ng gần nhất chuyển khoản theo phương thức ủy nhiệm chi hoặc qua thẻ ATM, Internet Banking, cổng thanh to&aacute;n điện tử, ...</span></p>
                  <p style="font-weight: 400;"><b><strong>Ng&acirc;n H&agrave;ng AGRIBANK </strong></b>- <strong>CN - Đ&Agrave; LẠT</strong></p>
                  <p style="font-weight: 400;">Số t&agrave;i khoản: 5406205260923</p>
                  <p style="font-weight: 400;">Người thụ hưởng: DINH VAN LANH</p>
                  <p style="font-weight: 400;"><b><strong>X&aacute;c nhận thanh to&aacute;n:</strong></b></p>
                  <p style="font-weight: 400;">Sau khi thanh to&aacute;n th&agrave;nh c&ocirc;ng, để ch&uacute;ng t&ocirc;i c&oacute; thể xử l&yacute; đơn h&agrave;ng của bạn nhanh ch&oacute;ng, phiền bạn cung cấp chứng từ thanh to&aacute;n hoặc ủy nhiệm chi, t&ecirc;n ng&acirc;n h&agrave;ng bạn gửi tới, tới địa chỉ email:&nbsp;<b><strong>finapp.fun@gmail.com</strong></b> (tốt nhất sử dụng email th&agrave;nh vi&ecirc;n Finapp.fun để gửi) theo mẫu sau:</p>
                  <p style="font-weight: 400;"><b><strong>Ti&ecirc;u đề (Subject)</strong></b>: Payment Confirmation<br /><b><strong>Nội dung (Content):&nbsp;</strong></b></p>
                  <p style="font-weight: 400;">Ng&acirc;n h&agrave;ng thụ hưởng (Receiving Bank):&nbsp;</p>
                  <p style="font-weight: 400;">T&ecirc;n người gửi (Sender name):&nbsp;</p>
                  <p style="font-weight: 400;">Đ&iacute;nh k&egrave;m chứng từ giao dịch, ủy nhiệm chi nếu c&oacute;.</p>
                  <p style="font-weight: 400;"><em>Khi nhận được th&ocirc;ng tin chuyển tiền v&agrave; nhận được email của qu&yacute; kh&aacute;ch, ch&uacute;ng t&ocirc;i sẽ tiến h&agrave;nh thực hiện y&ecirc;u cầu của bạn trong v&ograve;ng<span>&nbsp;</span><b><strong>24 giờ</strong></b><span>&nbsp;</span>trong ng&agrave;y l&agrave;m việc.</em></p>',
                  'content_contact'=>'',
                  'facebook_url'=>'https://www.facebook.com/',
                  'twitter_url'=>'https://twitter.com',
                  'instagram_url'=>'https://www.instagram.com',
                  'pinterest_url'=>'',
                  'linkedin_url'=>'https://www.linkedin.com/',
                  'vk_url'=>'https://vk.com',
                  'telegram_url'=>'',
                  'youtube_url'=>'',
                  'GOOGLE_RECAPTCHA_KEY'=>'6Ld6yaoZAAAAAEFcZwW6Snl3j63ek7jiAlBg0u6n',
                  'GOOGLE_RECAPTCHA_SECRET'=>'6Ld6yaoZAAAAAFs-uhYxs9AdTziUs4K8VQTgMqRE',
                //   
            ]);
    }
}

<?php
try {
    $db = new PDO('sqlite:writable/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $teachers = [
        ['Prof. Dr. Anisur Rahman', 'অধ্যাপক ড. আনিসুর রহমান', 'Head of Physics', 'Science', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCWUntDelZauKQ5D8L-dDjY8NequQu8kYpl_73kRWi4ybSZnvoX0g3YUXsG99_K9joKbTjPEg4ZtPjtdBdj7dAFdJyNybHe3G-sltfKXhqbdyi8iLC_Uol1T-GNgbIsjOzrEZ0OHZAF9MOucSUfFjrY212JSP7xJLUP9WlHPgRZ8svoAH4sWmFvMbY8MSkKJVFyv6OxA6c6ENHqGY9Wa8Wpz7rCvnppMy9-ZWAtJAOGMCwoHVtO8ChZLU2KN7MJeca9bwRT6yGcaA', 'M.Sc, PhD in Theoretical Physics (DU)'],
        ['Ms. Sayeda Begum', 'সৈয়দা বেগম', 'Assistant Professor', 'Science', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCYyES1yoNGVf6D3eDDMhZ-HKfcsXOB7G4g58-WRH1V0nMkTDgf5E38DvBEvJntju3aN43BLsK8XPpvcn1EdVqJvA9plWvE4txCdtPUpcqUuoXIVpNRtgPpfSvVU3VWzglZgkh2oNVv6xf5qpxBf0-7sMGDS3rUxyP7RXuOXEqhCsiybdtaoFU4eWCmY-GjEsQZeVcx1ZcsBulbzT7V_JEkZFtJ4WEYDSfxZgyUpQ59w0bjR6cjkzl4XYHSOjtSoo8hG5jMqhKI9Q', 'M.Sc in Biology (CU), B.Ed'],
        ['Mr. Jahid Hasan', 'জনাব জাহিদ হাসান', 'Senior Lecturer', 'Science', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCmh1_l2jhO2inZCig8M0QmpRe6WbVGHBwZWMUyEepC4mVYgDKYfoRMM9QwodiTMmb80GGVJloAkGo6VytiW-toDY4Oij_RqOFT61XhFiDys1gCXIZ5rurhIe1UhgS3mCMQ1vBufr2mjK83rTaGk4I2e74Sk_I977Q2CaV0B4CjxmRRHxZUqf8JkQmoZILZ3470RqMm3itOl7j9h4QDgIQTwMZssm6HLM98EZ-6S9W2i6tSaDY1m1ILKoG0cQllL4VDTdUDNnWr-A', 'M.Sc in Mathematics (RU)'],
        ['Mrs. Rokeya Sultana', 'মিসেস রোকেয়া সুলতানা', 'Head of Bangla', 'Arts', 'https://lh3.googleusercontent.com/aida-public/AB6AXuD7REmaOy3wbAwXkgIBqo6xY5QCPD-IW9rPfvrEDjp9DtgRNbDzw6B05E5DOKNQIrgtZKytX1ayAcqnuCZyEXHD2G7bRbQ4aC8EGGomWuxYv14Si5McfNDTIszczVy4hLS9KbXpGaky3-tLacyAuEn1lR0WmkGHwrUkjO3H_Ulg76a5KXgrF0a3Mvtz2lQELgcLNJRxzK9QeIyWXp8jRAnxYjgYKXfSpFupvPoFvfBdxq3dQ2J08iW2VlTNBulowWfuta7AvczvDw', 'M.A in Bangla Literature (DU)'],
        ['Mr. David Cooper', 'মি. ডেভিড কুপার', 'Senior English Lecturer', 'Arts', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrp8nBi0up-WXkwM2HNRfQV3G3MnNGxuwo0AZTR6wC2XSrtYatvM86uZPueVb1b4F6pI4i74hBGbITI4GL8q2EUikfflwb_BR4rQUc9ek7ah-44QXF6ThKLxNisQhI3nWHibtHhKpny6gy0R8oMdOY48hPqRB7mw80Cn6_5pmaEDn0nKAIyFj4EekOwiSs2SBuMhTv4E9bzJHhtJt7WMK7J5Pw5prW-pZFp6_jOBGrO4GAliUK-IBBwSLsvBgWiysaX7ygVgXpGg', 'M.A in English (Oxford), TESOL Cert.'],
        ['Mr. Abdur Rahim', 'জনাব আব্দুর রহিম', 'History Faculty', 'Arts', 'https://lh3.googleusercontent.com/aida-public/AB6AXuA2dRZGMY1K1SLA7bUoFzmYbOGvVPdOocXjnP4uTOqXSxiiRRt59yWYJ3lv6X2x359TN4FSc4y06MaVMLd4NOzvASoh3MFgsiwnyYnLyRBrvvPfIKTxLLbhqgBDtCGhKZWuaUNRwUdcUAPPn_npyWCR6UzlXCDVzrXfWNw9sBD3ax5Vu3DjauZnDiQaj_KXBbeyjKDAd2_Yit2WHnYvKkFTY-hNHEqjzDFGLWGLKWsZCnhTe-Yy_pqmDR-EmI19Q8k9sC5Dzgwn9A', 'M.A in Islamic History (DU)']
    ];

    $stmt = $db->prepare("INSERT INTO teachers (name, name_bn, designation, department, photo_url, qualification, created_at) VALUES (?, ?, ?, ?, ?, ?, datetime('now'))");
    foreach($teachers as $row) {
        $stmt->execute($row);
    }
    echo "Seeded Teachers successfully\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

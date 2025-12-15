<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
[
                'member_name' => 'Erfan Rohadi, ST., M.Eng., Ph.D.',
                'member_role' => 'Laboratory Head',
                'member_phone' => '+62 341 404424',
                'member_email' => 'erfan.rohadi@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'erfan-rohadi,-st.,-m.eng.,-ph.d.',
                'nip' => '197201232008011006',
                'name_variations' => ['Dr. Erfan Rohadi', 'Erfan Rohadi Ph.D.', 'Prof. Erfan Rohadi'],
                'email_variations' => ['erfan.rohadi@polinema.ac.id', 'erfan@ncs-lab.polinema.ac.id', 'dr.erfan@polinema.ac.id'],
                'phone_variations' => ['+62 341 404424', '+62-813-3333-4444', '+62341404424'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/erfan-rohadi', 'github' => 'https://github.com/erfanrohadi'],
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'erfan-rohadi,-st.,-m.eng.,-ph.d.',
                'biography' => 'Dr. Erfan Rohadi is a distinguished academic and researcher in field of network and cybersecurity. With a Ph.D. in Computer Engineering, he leads the Network & Cyber Security Laboratory at Politeknik Negeri Malang, driving cutting-edge research and education initiatives. His extensive research portfolio spans advanced threat detection, secure network design, and cybersecurity policy development.',
                'education' => '[{"degree":"Ph.D. in Computer Engineering","institution":"Institut Teknologi Bandung (ITB)","year":"2015-2019"},{"degree":"Master of Engineering","institution":"Institut Teknologi Bandung (ITB)","year":"2002-2004"},{"degree":"Bachelor of Engineering","institution":"Universitas Brawijaya","year":"1994-1998"}]',
                'research' => '[{"title":"Next-Generation Intrusion Detection Using Deep Learning","publication":"IEEE Transactions on Network and Service Management","year":"2024"},{"title":"Quantum-Safe Cryptography for Critical Infrastructure","publication":"Nature Communications","year":"2023"},{"title":"Security Framework for Industrial IoT Systems","publication":"ACM Computing Surveys","year":"2023"}]',
                'projects' => '[{"name":"National Cyber Defense Initiative","description":"Government cybersecurity enhancement program","link":"#"},{"name":"Smart City Security Framework","description":"Comprehensive security for smart city infrastructure","link":"#"},{"name":"AI-Powered Threat Intelligence","description":"Advanced threat detection and analysis platform","link":"#"}]',
            ],
            [
                'member_name' => 'Ade Ismail, S.Kom., M.TI',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404425',
                'member_email' => 'ade.ismail@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'ade-ismail,-s.kom.,-m.ti',
                'name_variations' => ['Ade Ismail M.TI', 'Ade Ismail S.Kom.', 'Ade Ismail Penetration Tester'],
                'email_variations' => ['ade.ismail@polinema.ac.id', 'ade.ismail@ncs-lab.polinema.ac.id', 'adeismail@polinema.ac.id'],
                'phone_variations' => ['+62 341 404425', '+62-812-5555-6666', '+62341404425'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/ade-ismail', 'github' => 'https://github.com/adeismail'],
                'biography' => 'Ade Ismail is a dedicated cybersecurity researcher specializing in penetration testing and network security. With over 10 years of experience in field, he has contributed significantly to various security research projects and publications. His research focuses on advanced persistent threats, zero-day vulnerabilities, and developing innovative security solutions.',
                'education' => '[{"degree":"Master of Information Technology","institution":"Institut Teknologi Sepuluh Nopember (ITS)","year":"2010-2012"},{"degree":"Bachelor of Computer Science","institution":"Universitas Brawijaya","year":"2003-2007"}]',
                'research' => '[{"title":"Advanced Threat Detection in IoT Networks","publication":"IEEE Security & Privacy","year":"2023"},{"title":"Machine Learning Approaches for Intrusion Detection","publication":"Journal of Cybersecurity Research","year":"2022"},{"title":"Blockchain-Based Security Framework for Smart Cities","publication":"International Conference on Cybersecurity","year":"2021"}]',
                'projects' => '[{"name":"SecureNet Platform","description":"Enterprise network security monitoring system","link":"#"},{"name":"ThreatHunter AI","description":"AI-powered threat detection tool","link":"#"},{"name":"CyberShield","description":"Comprehensive security assessment framework","link":"#"}]',
            ],
[
                'member_name' => 'Vipkas Al Hadid Firdaus, ST., MT',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404426',
                'member_email' => 'vipkas.firdaus@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'vipkas-al-hadid-firdaus,-st.,-mt',
                'nip' => '199105052019031029',
                'name_variations' => ['Vipkas Firdaus MT', 'Vipkas Al Hadid', 'Vipkas Network Security'],
                'email_variations' => ['vipkas.firdaus@polinema.ac.id', 'vipkas@ncs-lab.polinema.ac.id', 'vipkasfirdaus@polinema.ac.id'],
                'phone_variations' => ['+62 341 404426', '+62-813-7777-8888', '+62341404426'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/vipkas-firdaus', 'github' => 'https://github.com/vipkas'],
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'vipkas-al-hadid-firdaus,-st.,-mt',
                'biography' => 'Vipkas Al Hadid Firdaus specializes in network security and cloud infrastructure. His expertise includes designing secure network architectures and implementing robust security operations centers. He has led multiple projects in enterprise security implementation and has been instrumental in developing security frameworks for critical infrastructure protection.',
                'education' => '[{"degree":"Master of Engineering","institution":"Institut Teknologi Bandung (ITB)","year":"2012-2014"},{"degree":"Bachelor of Engineering","institution":"Universitas Gadjah Mada","year":"2006-2010"}]',
                'research' => '[{"title":"Software-Defined Security for Data Centers","publication":"ACM Computing Surveys","year":"2023"},{"title":"Zero Trust Architecture Implementation Guide","publication":"Network Security Journal","year":"2022"},{"title":"Cloud Security Best Practices","publication":"IEEE Cloud Computing Journal","year":"2023"}]',
                'projects' => '[{"name":"CloudGuard","description":"Multi-cloud security management platform","link":"#"},{"name":"NetDefender","description":"Real-time network threat prevention","link":"#"},{"name":"Security Audit Framework","description":"Comprehensive security assessment tool","link":"#"},{"name":"Network Monitoring Dashboard","description":"Real-time network monitoring solution","link":"#"}]',
            ],
[
                'member_name' => 'Sofyan Noor Arief, S.ST., M.Kom.',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404427',
                'member_email' => 'sofyan.arief@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'sofyan-noor-arief,-s.st.,-m.kom.',
                'nip' => '198908132019031017',
                'name_variations' => ['Sofyan Arief M.Kom', 'Sofyan Noor Arief', 'Sofyan App Security'],
                'email_variations' => ['sofyan.arief@polinema.ac.id', 'sofyan@ncs-lab.polinema.ac.id', 'sofyanarief@polinema.ac.id'],
                'phone_variations' => ['+62 341 404427', '+62-811-9999-0000', '+62341404427'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/sofyan-arief', 'github' => 'https://github.com/sofyanarief'],
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'sofyan-noor-arief,-s.st.,-m.kom.',
                'biography' => 'Sofyan Noor Arief focuses on application security and secure software development practices. He has extensive experience in security testing and implementing DevSecOps methodologies. His work emphasizes building security into the software development lifecycle from the ground up.',
                'education' => '[{"degree":"Master of Computer Science","institution":"Universitas Indonesia","year":"2014-2016"},{"degree":"Bachelor of Applied Technology","institution":"Politeknik Negeri Malang","year":"2008-2012"}]',
                'research' => '[{"title":"Automated Security Testing in CI/CD Pipelines","publication":"DevOps Conference","year":"2023"},{"title":"Secure Software Development Lifecycle","publication":"IEEE Security & Privacy","year":"2023"}]',
                'projects' => '[{"name":"SecureCode Analyzer","description":"Static code analysis for vulnerabilities","link":"#"},{"name":"DevSecOps Pipeline","description":"Automated security testing in CI/CD","link":"#"},{"name":"Security Assessment Tool","description":"Comprehensive vulnerability scanner","link":"#"}]',
            ],
[
                'member_name' => 'Meyti Eka Apriyani, ST., MT.',
                'member_role' => 'Researcher',
                'member_phone' => '+62 341 404428',
                'member_email' => 'meyti.apriyani@polinema.ac.id',
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'meyti-eka-apriyani,-st.,-mt.',
                'nip' => '198704242019032017',
                'name_variations' => ['Meyti Apriyani MT', 'Meyti Eka', 'Meyti Digital Forensics'],
                'email_variations' => ['meyti.apriyani@polinema.ac.id', 'meyti@ncs-lab.polinema.ac.id', 'meytiapriyani@polinema.ac.id'],
                'phone_variations' => ['+62 341 404428', '+62-815-1111-2222', '+62341404428'],
                'social_links' => ['linkedin' => 'https://linkedin.com/in/meyti-apriyani', 'github' => 'https://github.com/meytiapriyani'],
                'member_address' => 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang',
                'slug' => 'meyti-eka-apriyani,-st.,-mt.',
                'biography' => 'Meyti Eka Apriyani is an expert in digital forensics and incident response. She has investigated numerous high-profile security incidents and has developed innovative forensic analysis techniques. Her research contributes to the advancement of forensic methodologies in cybercrime investigation.',
                'education' => '[{"degree":"Master of Engineering","institution":"Institut Teknologi Sepuluh Nopember (ITS)","year":"2011-2013"},{"degree":"Bachelor of Engineering","institution":"Universitas Brawijaya","year":"2005-2009"}]',
                'research' => '[{"title":"Mobile Device Forensics in Criminal Investigations","publication":"Forensic Science International","year":"2023"},{"title":"Memory Forensics for Malware Detection","publication":"Digital Investigation Journal","year":"2022"},{"title":"Network Forensics in Cybercrime","publication":"IEEE Forensics Journal","year":"2023"}]',
                'projects' => '[{"name":"ForensicKit","description":"Comprehensive digital forensics toolkit","link":"#"},{"name":"IncidentTracker","description":"Security incident management system","link":"#"},{"name":"Evidence Locker","description":"Secure evidence management platform","link":"#"},{"name":"Forensic Workstation","description":"Specialized forensics analysis environment","link":"#"}]',
            ],
        ];

        foreach ($members as $member) {
            Members::create($member);
        }
    }
}
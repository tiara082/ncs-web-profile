<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archives;
use App\Models\Members;

class MemberPublicationsSeeder extends Seeder
{
    public function run(): void
    {
        // Get all members
        $members = Members::all();
        
        // Publications data for each member
        $publicationsData = [
            'Erfan Rohadi, ST., M.Eng., Ph.D.' => [
                [
                    'title' => 'Advanced Network Security Framework for Critical Infrastructure Protection',
                    'description' => 'A comprehensive framework for protecting critical infrastructure networks against advanced persistent threats using machine learning and behavioral analysis.',
                    'type' => 'research',
                    'category' => 'Network Security',
                    'publication' => 'IEEE Transactions on Network Security',
                    'year' => '2024',
                    'keywords' => 'network security, critical infrastructure, machine learning, APT protection, behavioral analysis',
                    'doi' => '10.1109/TNS.2024.1234567',
                    'issn_journal' => '2332-4567',
                    'cover_image' => 'covers/network-security-2024.jpg'
                ],
                [
                    'title' => 'Zero-Trust Architecture Implementation in Enterprise Networks',
                    'description' => 'Implementation strategies and performance analysis of zero-trust security models in large-scale enterprise network environments.',
                    'type' => 'publication',
                    'category' => 'Enterprise Security',
                    'publication' => 'ACM Conference on Computer and Communications Security',
                    'year' => '2023',
                    'keywords' => 'zero-trust, enterprise security, network architecture, access control, security policies',
                    'doi' => '10.1145/3576915.3576920',
                    'issn_journal' => '1543-7221',
                    'cover_image' => 'covers/zero-trust-2023.jpg'
                ],
                [
                    'title' => 'Cybersecurity Leadership in Digital Transformation Era',
                    'description' => 'Leadership strategies for managing cybersecurity challenges during organizational digital transformation initiatives.',
                    'type' => 'research',
                    'category' => 'Security Management',
                    'publication' => 'Journal of Cybersecurity Leadership',
                    'year' => '2023',
                    'keywords' => 'cybersecurity leadership, digital transformation, security governance, risk management, strategic planning',
                    'doi' => '10.1080/23736892.2023.1234567',
                    'issn_journal' => '2373-6892',
                    'cover_image' => 'covers/leadership-2023.jpg'
                ]
            ],
            'Ade Ismail, S.Kom., M.TI' => [
                [
                    'title' => 'Deep Learning-Based Malware Detection in IoT Networks',
                    'description' => 'A novel approach using deep neural networks for detecting and classifying malware in Internet of Things network traffic.',
                    'type' => 'research',
                    'category' => 'Malware Analysis',
                    'publication' => 'IEEE Internet of Things Journal',
                    'year' => '2024',
                    'keywords' => 'malware detection, deep learning, IoT security, neural networks, traffic analysis',
                    'doi' => '10.1109/JIOT.2024.2345678',
                    'issn_journal' => '2327-4662',
                    'cover_image' => 'covers/iot-malware-2024.jpg'
                ],
                [
                    'title' => 'Automated Penetration Testing Framework for Web Applications',
                    'description' => 'An automated framework for conducting comprehensive penetration testing of modern web applications using AI-driven techniques.',
                    'type' => 'publication',
                    'category' => 'Penetration Testing',
                    'publication' => 'Black Hat USA Conference',
                    'year' => '2023',
                    'keywords' => 'penetration testing, web security, automated testing, vulnerability assessment, security testing',
                    'doi' => '10.5555/12345678',
                    'issn_journal' => '1946-5448',
                    'cover_image' => 'covers/pen-testing-2023.jpg'
                ],
                [
                    'title' => 'Cryptographic Protocol Analysis for Blockchain Systems',
                    'description' => 'Security analysis and improvement of cryptographic protocols used in blockchain and cryptocurrency systems.',
                    'type' => 'research',
                    'category' => 'Cryptography',
                    'publication' => 'Journal of Cryptographic Engineering',
                    'year' => '2023',
                    'keywords' => 'cryptography, blockchain, security protocols, cryptocurrency, cryptographic analysis',
                    'doi' => '10.1007/s13389-023-00345-6',
                    'issn_journal' => '2190-8508',
                    'cover_image' => 'covers/crypto-2023.jpg'
                ]
            ],
            'Vipkas Al Hadid Firdaus, ST., MT' => [
                [
                    'title' => 'Cloud Security Orchestration in Multi-Cloud Environments',
                    'description' => 'A comprehensive approach to security orchestration and automated response in complex multi-cloud deployment scenarios.',
                    'type' => 'research',
                    'category' => 'Cloud Security',
                    'publication' => 'IEEE Cloud Computing',
                    'year' => '2024',
                    'keywords' => 'cloud security, multi-cloud, security orchestration, automated response, cloud deployment',
                    'doi' => '10.1109/MCC.2024.3456789',
                    'issn_journal' => '1939-1409',
                    'cover_image' => 'covers/cloud-security-2024.jpg'
                ],
                [
                    'title' => 'Network Infrastructure Design for Smart Cities',
                    'description' => 'Scalable and secure network infrastructure design patterns for smart city implementations and IoT integration.',
                    'type' => 'publication',
                    'category' => 'Network Architecture',
                    'publication' => 'IEEE International Conference on Smart Computing',
                    'year' => '2023',
                    'keywords' => 'smart cities, network architecture, IoT integration, infrastructure design, urban computing',
                    'doi' => '10.1109/SMARTCOMP.2023.4567890',
                    'issn_journal' => '2378-6243',
                    'cover_image' => 'covers/smart-cities-2023.jpg'
                ],
                [
                    'title' => 'Security Operations Center Automation Framework',
                    'description' => 'Automation framework for modern Security Operations Centers using AI and machine learning for threat detection.',
                    'type' => 'research',
                    'category' => 'Security Operations',
                    'publication' => 'Journal of Information Security',
                    'year' => '2023',
                    'keywords' => 'SOC automation, security operations, threat detection, machine learning, incident response',
                    'doi' => '10.1155/2023/1234567',
                    'issn_journal' => '1941-6218',
                    'cover_image' => 'covers/soc-automation-2023.jpg'
                ]
            ],
            'Sofyan Noor Arief, S.ST., M.Kom.' => [
                [
                    'title' => 'Secure Software Development Lifecycle for DevSecOps',
                    'description' => 'Integration of security practices throughout the software development lifecycle in DevOps environments.',
                    'type' => 'research',
                    'category' => 'Application Security',
                    'publication' => 'IEEE Software',
                    'year' => '2024',
                    'keywords' => 'DevSecOps, secure development, software security, CI/CD, security integration',
                    'doi' => '10.1109/MS.2024.5678901',
                    'issn_journal' => '0740-7459',
                    'cover_image' => 'covers/devsecops-2024.jpg'
                ],
                [
                    'title' => 'Static Code Analysis for Security Vulnerability Detection',
                    'description' => 'Advanced static analysis techniques for early detection of security vulnerabilities in source code.',
                    'type' => 'publication',
                    'category' => 'Code Security',
                    'publication' => 'ACM Computing Surveys',
                    'year' => '2023',
                    'keywords' => 'static analysis, code security, vulnerability detection, software testing, security scanning',
                    'doi' => '10.1145/3456789.3456790',
                    'issn_journal' => '0360-0300',
                    'cover_image' => 'covers/code-analysis-2023.jpg'
                ],
                [
                    'title' => 'Container Security in Kubernetes Environments',
                    'description' => 'Security best practices and tools for containerized applications running in Kubernetes clusters.',
                    'type' => 'research',
                    'category' => 'Container Security',
                    'publication' => 'Journal of Cloud Computing',
                    'year' => '2023',
                    'keywords' => 'container security, Kubernetes, Docker, cloud security, orchestration security',
                    'doi' => '10.1186/s13677-023-01234-5',
                    'issn_journal' => '2192-113X',
                    'cover_image' => 'covers/kubernetes-2023.jpg'
                ]
            ],
            'Meyti Eka Apriyani, ST., MT.' => [
                [
                    'title' => 'Digital Forensics Investigation Framework for Ransomware Attacks',
                    'description' => 'Comprehensive digital forensics framework specifically designed for investigating ransomware attack scenarios.',
                    'type' => 'research',
                    'category' => 'Digital Forensics',
                    'publication' => 'Digital Investigation',
                    'year' => '2024',
                    'keywords' => 'digital forensics, ransomware, incident response, evidence collection, cybercrime investigation',
                    'doi' => '10.1016/j.diin.2024.123456',
                    'issn_journal' => '1742-2876',
                    'cover_image' => 'covers/ransomware-2024.jpg'
                ],
                [
                    'title' => 'Memory Forensics for Advanced Persistent Threat Detection',
                    'description' => 'Memory analysis techniques for detecting and investigating advanced persistent threats in compromised systems.',
                    'type' => 'publication',
                    'category' => 'Memory Forensics',
                    'publication' => 'USENIX Security Symposium',
                    'year' => '2023',
                    'keywords' => 'memory forensics, APT detection, threat analysis, incident investigation, system memory',
                    'doi' => '10.5555/23456789',
                    'issn_journal' => '1943-6206',
                    'cover_image' => 'covers/memory-forensics-2023.jpg'
                ],
                [
                    'title' => 'Cybercrime Investigation Using Machine Learning',
                    'description' => 'Application of machine learning algorithms for pattern recognition and evidence analysis in cybercrime investigations.',
                    'type' => 'research',
                    'category' => 'Cybercrime Investigation',
                    'publication' => 'Journal of Digital Forensics',
                    'year' => '2023',
                    'keywords' => 'cybercrime, machine learning, pattern recognition, evidence analysis, investigation techniques',
                    'doi' => '10.1080/19401136.2023.2345678',
                    'issn_journal' => '1940-1136',
                    'cover_image' => 'covers/cybercrime-2023.jpg'
                ]
            ]
        ];

        // Create publications for each member
        foreach ($members as $member) {
            $memberName = $member->member_name;
            
            if (isset($publicationsData[$memberName])) {
                foreach ($publicationsData[$memberName] as $pubData) {
                    Archives::create([
                        'title' => $pubData['title'],
                        'description' => $pubData['description'],
                        'category' => $pubData['category'],
                        'type' => $pubData['type'],
                        'publication' => $pubData['publication'],
                        'year' => $pubData['year'],
                        'author_id' => $member->id,
                        'keywords' => $pubData['keywords'],
                        'doi' => $pubData['doi'],
                        'issn_journal' => $pubData['issn_journal'],
                        'cover_image' => $pubData['cover_image'],
                        'file_path' => 'archives/sample-' . strtolower(str_replace(' ', '-', $pubData['title'])) . '.pdf',
                        'uploaded_by' => 1 // Assuming admin with ID 1
                    ]);
                }
            }
        }
    }
}
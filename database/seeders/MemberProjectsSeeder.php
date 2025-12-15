<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Members;

class MemberProjectsSeeder extends Seeder
{
    public function run(): void
    {
        // Get all members
        $members = Members::all();
        
        // Projects data for each member
        $projectsData = [
            'Erfan Rohadi, ST., M.Eng., Ph.D.' => [
                [
                    'name' => 'Critical Infrastructure Security Framework',
                    'description' => 'Development of a comprehensive security framework for protecting national critical infrastructure including power grids, water systems, and transportation networks from cyber threats.',
                    'link' => 'https://github.com/ncs-lab/critical-infrastructure-security',
                    'technologies' => ['Machine Learning', 'Network Security', 'SIEM', 'Threat Intelligence']
                ],
                [
                    'name' => 'AI-Powered Threat Detection System',
                    'description' => 'Research and implementation of artificial intelligence algorithms for real-time detection of advanced persistent threats and zero-day attacks.',
                    'link' => 'https://github.com/ncs-lab/ai-threat-detection',
                    'technologies' => ['Python', 'TensorFlow', 'Deep Learning', 'Network Analysis']
                ],
                [
                    'name' => 'Cybersecurity Governance Platform',
                    'description' => 'Enterprise platform for managing cybersecurity policies, compliance, and governance across large organizations with multiple business units.',
                    'link' => 'https://github.com/ncs-lab/security-governance',
                    'technologies' => ['Laravel', 'Vue.js', 'Compliance Management', 'Risk Assessment']
                ]
            ],
            'Ade Ismail, S.Kom., M.TI' => [
                [
                    'name' => 'Automated Penetration Testing Suite',
                    'description' => 'Comprehensive automated penetration testing toolkit that simulates various attack vectors to identify vulnerabilities in web applications and network infrastructure.',
                    'link' => 'https://github.com/ncs-lab/auto-pentest-suite',
                    'technologies' => ['Python', 'Metasploit', 'Burp Suite', 'OWASP ZAP']
                ],
                [
                    'name' => 'IoT Malware Analysis Framework',
                    'description' => 'Specialized framework for analyzing and reverse-engineering malware targeting Internet of Things devices and embedded systems.',
                    'link' => 'https://github.com/ncs-lab/iot-malware-analysis',
                    'technologies' => ['Reverse Engineering', 'IoT Security', 'Firmware Analysis', 'Static Analysis']
                ],
                [
                    'name' => 'Cryptographic Protocol Validator',
                    'description' => 'Tool for validating and testing the security of cryptographic protocols used in blockchain, messaging applications, and secure communications.',
                    'link' => 'https://github.com/ncs-lab/crypto-validator',
                    'technologies' => ['Cryptography', 'Protocol Analysis', 'Formal Verification', 'Security Testing']
                ]
            ],
            'Vipkas Al Hadid Firdaus, ST., MT' => [
                [
                    'name' => 'Multi-Cloud Security Orchestrator',
                    'description' => 'Platform for orchestrating security policies and automated responses across multiple cloud providers including AWS, Azure, and Google Cloud.',
                    'link' => 'https://github.com/ncs-lab/multi-cloud-orchestrator',
                    'technologies' => ['Cloud Security', 'Kubernetes', 'Terraform', 'DevSecOps']
                ],
                [
                    'name' => 'Smart City Network Infrastructure',
                    'description' => 'Design and implementation of secure, scalable network infrastructure for smart city deployments integrating IoT sensors, surveillance systems, and municipal services.',
                    'link' => 'https://github.com/ncs-lab/smart-city-network',
                    'technologies' => ['Network Architecture', 'IoT Integration', '5G Networks', 'Urban Computing']
                ],
                [
                    'name' => 'Security Operations Center Automation',
                    'description' => 'Automation framework for modern SOC operations including incident triage, threat hunting, and automated response capabilities.',
                    'link' => 'https://github.com/ncs-lab/soc-automation',
                    'technologies' => ['SIEM', 'SOAR', 'Threat Intelligence', 'Incident Response']
                ]
            ],
            'Sofyan Noor Arief, S.ST., M.Kom.' => [
                [
                    'name' => 'DevSecOps Pipeline Security Scanner',
                    'description' => 'Integrated security scanning tool for CI/CD pipelines that automatically identifies vulnerabilities in code, dependencies, and infrastructure configurations.',
                    'link' => 'https://github.com/ncs-lab/devsecops-scanner',
                    'technologies' => ['DevSecOps', 'CI/CD', 'Static Analysis', 'Container Security']
                ],
                [
                    'name' => 'Secure Code Review Assistant',
                    'description' => 'AI-powered tool that assists developers in identifying security vulnerabilities during code review and provides remediation recommendations.',
                    'link' => 'https://github.com/ncs-lab/secure-code-review',
                    'technologies' => ['Code Analysis', 'Machine Learning', 'Security Patterns', 'IDE Integration']
                ],
                [
                    'name' => 'Kubernetes Security Hardening Tool',
                    'description' => 'Automated tool for hardening Kubernetes clusters against common security misconfigurations and implementing best practices for container orchestration.',
                    'link' => 'https://github.com/ncs-lab/k8s-security',
                    'technologies' => ['Kubernetes', 'Container Security', 'Infrastructure as Code', 'Security Policies']
                ]
            ],
            'Meyti Eka Apriyani, ST., MT.' => [
                [
                    'name' => 'Ransomware Investigation Toolkit',
                    'description' => 'Comprehensive toolkit for digital forensics investigators specializing in ransomware attacks, including decryption tools and evidence collection.',
                    'link' => 'https://github.com/ncs-lab/ransomware-toolkit',
                    'technologies' => ['Digital Forensics', 'Malware Analysis', 'Evidence Collection', 'Incident Response']
                ],
                [
                    'name' => 'Memory Analysis Framework',
                    'description' => 'Advanced memory forensics framework for detecting sophisticated malware and investigating security incidents through RAM analysis.',
                    'link' => 'https://github.com/ncs-lab/memory-analysis',
                    'technologies' => ['Memory Forensics', 'Volatility', 'Malware Detection', 'Incident Investigation']
                ],
                [
                    'name' => 'Cybercrime Evidence Management System',
                    'description' => 'Digital evidence management system for law enforcement agencies handling cybercrime investigations with chain of custody and legal compliance.',
                    'link' => 'https://github.com/ncs-lab/evidence-management',
                    'technologies' => ['Evidence Management', 'Legal Compliance', 'Chain of Custody', 'Case Management']
                ]
            ]
        ];

        // Update each member with projects
        foreach ($members as $member) {
            $memberName = $member->member_name;
            
            if (isset($projectsData[$memberName])) {
                $member->projects = json_encode($projectsData[$memberName]);
                $member->save();
            }
        }
    }
}
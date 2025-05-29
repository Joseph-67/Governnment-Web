<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use a set of unique government-related words for tags
        $dictionary = [
            'government', 'official', 'minister', 'ministry', 'department', 'agency', 'bureau', 'secretary',
            'parliament', 'congress', 'senate', 'assembly', 'council', 'committee', 'commission', 'governor',
            'mayor', 'president', 'prime', 'chancellor', 'ambassador', 'diplomat', 'representative', 'delegate',
            'administrator', 'director', 'officer', 'inspector', 'auditor', 'registrar', 'clerk', 'magistrate',
            'judge', 'justice', 'attorney', 'prosecutor', 'solicitor', 'advisor', 'consultant', 'supervisor',
            'warden', 'commissioner', 'controller', 'treasurer', 'counselor', 'liaison', 'envoy', 'consul',
            'attache', 'staff', 'cabinet', 'executive', 'legislator', 'policy', 'regulation', 'statute',
            'ordinance', 'decree', 'mandate', 'proclamation', 'resolution', 'order', 'directive', 'notice',
            'announcement', 'bulletin', 'memorandum', 'protocol', 'treaty', 'agreement', 'charter', 'constitution',
            'bill', 'act', 'law', 'code', 'rule', 'guideline', 'framework', 'plan', 'strategy', 'program',
            'initiative', 'project', 'scheme', 'fund', 'grant', 'subsidy', 'budget', 'allocation', 'revenue',
            'tax', 'levy', 'fee', 'license', 'permit', 'passport', 'visa', 'certificate', 'record', 'registry',
            'census', 'survey', 'audit', 'inspection', 'compliance', 'enforcement', 'oversight', 'review',
            'evaluation', 'report', 'statement', 'briefing', 'hearing', 'session', 'meeting', 'conference',
            'summit', 'forum', 'panel', 'workshop', 'taskforce', 'mission', 'delegation', 'representation',
            'public', 'service', 'civil', 'servant', 'employee', 'worker', 'staffer', 'personnel', 'resources',
            'employment', 'appointment', 'nomination', 'confirmation', 'tenure', 'retirement', 'pension',
            'benefit', 'compensation', 'salary', 'wage', 'payroll', 'allowance', 'bonus', 'overtime', 'leave',
            'holiday', 'vacation', 'absence', 'attendance', 'discipline', 'grievance', 'complaint', 'appeal',
            'arbitration', 'mediation', 'settlement', 'dispute', 'conflict', 'resolution', 'negotiation',
            'bargaining', 'contract', 'consent', 'authorization', 'approval', 'endorsement', 'ratification',
            'sanction', 'certification', 'registration', 'enrollment', 'application', 'submission', 'processing',
            'assessment', 'selection', 'recruitment', 'hiring', 'interview', 'screening', 'background', 'check',
            'clearance', 'security', 'investigation', 'vetting', 'reference', 'verification', 'qualification',
            'credential', 'degree', 'diploma', 'transcript', 'file', 'document', 'archive', 'storage', 'retrieval',
            'access', 'disclosure', 'confidentiality', 'privacy', 'protection', 'safeguard', 'standard', 'manual',
            'handbook', 'instruction', 'specification', 'criteria', 'benchmark', 'indicator', 'target', 'goal',
            'objective', 'priority', 'agenda', 'roadmap', 'timeline', 'schedule', 'calendar', 'deadline',
            'milestone', 'deliverable', 'output', 'outcome', 'result', 'impact', 'effect', 'consequence',
            'advantage', 'value', 'cost', 'expense', 'expenditure', 'investment', 'funding', 'financing', 'loan',
            'credit', 'debt', 'liability', 'asset', 'property', 'estate', 'ownership', 'title', 'deed', 'lease',
            'rental', 'obligation', 'commitment', 'responsibility', 'duty', 'function', 'role', 'position',
            'office', 'post', 'assignment', 'task', 'job', 'work', 'activity', 'operation', 'process', 'method',
            'approach', 'system', 'mechanism', 'tool', 'instrument', 'device', 'equipment', 'facility',
            'infrastructure', 'building', 'structure', 'site', 'location', 'address', 'area', 'region', 'district',
            'zone', 'sector', 'division', 'unit', 'branch', 'section', 'board', 'team', 'network', 'partnership',
            'collaboration', 'alliance', 'association', 'organization', 'institution', 'entity', 'body',
            'authority', 'jurisdiction', 'power', 'competence', 'capacity', 'capability', 'resource', 'support',
            'assistance', 'aid', 'help', 'provision', 'supply', 'delivery', 'distribution', 'deployment',
            'mobilization', 'utilization', 'management', 'administration', 'coordination', 'supervision',
            'monitoring', 'inquiry', 'examination', 'analysis', 'study', 'research', 'data', 'information',
            'statistics', 'publication', 'release', 'newsletter', 'update', 'communication', 'message', 'letter',
            'memo', 'correspondence', 'email', 'fax', 'telegram', 'dispatch', 'transmission', 'broadcast',
            'media', 'press', 'news', 'coverage', 'dialogue', 'discussion', 'debate', 'seminar', 'symposium',
            'event', 'ceremony', 'celebration', 'commemoration', 'observance', 'festival', 'campaign', 'drive',
            'reform', 'change', 'improvement', 'innovation', 'modernization', 'transformation', 'development',
            'growth', 'progress', 'advancement', 'expansion', 'extension', 'increase', 'enhancement', 'upgrade',
            'renovation', 'restoration', 'maintenance', 'repair', 'replacement', 'construction', 'installation',
            'implementation', 'execution', 'functioning', 'performance', 'achievement', 'success', 'failure',
            'problem', 'issue', 'challenge', 'risk', 'threat', 'hazard', 'danger', 'emergency', 'crisis',
            'disaster', 'accident', 'incident', 'occurrence', 'situation', 'condition', 'circumstance', 'factor',
            'cause', 'reason', 'basis', 'foundation', 'principle', 'concept', 'idea', 'notion', 'belief', 'norm',
            'practice', 'custom', 'tradition', 'convention', 'transparency', 'integrity', 'ethics', 'morality',
            'honesty', 'fairness', 'equality', 'equity', 'diversity', 'inclusion', 'participation', 'engagement',
            'involvement', 'community', 'society', 'citizen', 'resident', 'inhabitant', 'population', 'people',
            'individual', 'person', 'family', 'household', 'home', 'dwelling'
        ];

        // Shuffle and pick 200 unique tags
        shuffle($dictionary);
        $tags = [];
        $now = now();

        foreach (array_slice($dictionary, 0, 500) as $word) {
            $tags[] = [
                'name' => ucfirst($word),
                'slug' => Str::slug($word),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('tags')->insert($tags);
    }
}

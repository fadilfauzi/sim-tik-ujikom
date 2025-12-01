<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Category;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create categories
        $categories = [
            'Komputer & Laptop' => Category::firstOrCreate(['name' => 'Komputer & Laptop']),
            'Jaringan (Router/Switch)' => Category::firstOrCreate(['name' => 'Jaringan (Router/Switch)']),
            'Printer & Scanner' => Category::firstOrCreate(['name' => 'Printer & Scanner']),
            'Server' => Category::firstOrCreate(['name' => 'Server']),
        ];

        // Assets data
        $assets = [
            // Komputer & Laptop
            ['name' => 'Laptop Dell Latitude 5420', 'asset_tag' => 'KMP-001', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'Laptop HP EliteBook 840 G8', 'asset_tag' => 'KMP-002', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'PC Lenovo ThinkCentre M70q', 'asset_tag' => 'KMP-003', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'Laptop ASUS VivoBook 15', 'asset_tag' => 'KMP-004', 'category' => 'Komputer & Laptop', 'status' => 'Rusak Ringan'],
            ['name' => 'PC Dell OptiPlex 3090', 'asset_tag' => 'KMP-005', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'Laptop Acer Swift 3', 'asset_tag' => 'KMP-006', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'MacBook Air M1', 'asset_tag' => 'KMP-007', 'category' => 'Komputer & Laptop', 'status' => 'Baik'],
            ['name' => 'PC HP ProDesk 400 G6', 'asset_tag' => 'KMP-008', 'category' => 'Komputer & Laptop', 'status' => 'Rusak Ringan'],

            // Jaringan (Router/Switch)
            ['name' => 'Router Cisco 2911', 'asset_tag' => 'NET-001', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Switch Cisco Catalyst 2960', 'asset_tag' => 'NET-002', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Router TP-Link Archer AX6000', 'asset_tag' => 'NET-003', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Switch D-Link DES-1024', 'asset_tag' => 'NET-004', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Access Point Ubiquiti UniFi 6 LR', 'asset_tag' => 'NET-005', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Router MikroTik RouterBOARD 3011', 'asset_tag' => 'NET-006', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Rusak Ringan'],
            ['name' => 'Switch Netgear GS108', 'asset_tag' => 'NET-007', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],
            ['name' => 'Router ASUS RT-AX88U', 'asset_tag' => 'NET-008', 'category' => 'Jaringan (Router/Switch)', 'status' => 'Baik'],

            // Printer & Scanner
            ['name' => 'Printer HP LaserJet Pro M404n', 'asset_tag' => 'PRT-001', 'category' => 'Printer & Scanner', 'status' => 'Baik'],
            ['name' => 'Printer Epson EcoTank L3150', 'asset_tag' => 'PRT-002', 'category' => 'Printer & Scanner', 'status' => 'Rusak Ringan'],
            ['name' => 'Scanner Canon CanoScan LiDE 400', 'asset_tag' => 'PRT-003', 'category' => 'Printer & Scanner', 'status' => 'Baik'],
            ['name' => 'Printer Brother DCP-L2550DW', 'asset_tag' => 'PRT-004', 'category' => 'Printer & Scanner', 'status' => 'Baik'],
            ['name' => 'Printer Canon PIXMA G3010', 'asset_tag' => 'PRT-005', 'category' => 'Printer & Scanner', 'status' => 'Baik'],
            ['name' => 'Scanner Epson Perfection V600', 'asset_tag' => 'PRT-006', 'category' => 'Printer & Scanner', 'status' => 'Baik'],
            ['name' => 'Printer Xerox WorkCentre 6515', 'asset_tag' => 'PRT-007', 'category' => 'Printer & Scanner', 'status' => 'Rusak Ringan'],
            ['name' => 'Printer Samsung Xpress M2070', 'asset_tag' => 'PRT-008', 'category' => 'Printer & Scanner', 'status' => 'Baik'],

            // Server
            ['name' => 'Server Dell PowerEdge R740', 'asset_tag' => 'SRV-001', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'Server HPE ProLiant DL380 Gen10', 'asset_tag' => 'SRV-002', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'Server Lenovo ThinkSystem SR650', 'asset_tag' => 'SRV-003', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'Server Cisco UCS C220 M5', 'asset_tag' => 'SRV-004', 'category' => 'Server', 'status' => 'Rusak Ringan'],
            ['name' => 'Server Supermicro SYS-5019S-M', 'asset_tag' => 'SRV-005', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'NAS Synology DS920+', 'asset_tag' => 'SRV-006', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'Server Fujitsu PRIMERGY RX1330 M5', 'asset_tag' => 'SRV-007', 'category' => 'Server', 'status' => 'Baik'],
            ['name' => 'Server IBM System x3550 M5', 'asset_tag' => 'SRV-008', 'category' => 'Server', 'status' => 'Baik'],
        ];

        foreach ($assets as $assetData) {
            Asset::create([
                'name' => $assetData['name'],
                'asset_tag' => $assetData['asset_tag'],
                'category_id' => $categories[$assetData['category']]->id,
                'status' => $assetData['status'],
                'location' => 'Kantor Pusat',
                'serial_number' => 'SN-' . str_replace('-', '', $assetData['asset_tag']) . '-' . rand(1000, 9999),
                'purchase_date' => now()->subMonths(rand(1, 24))->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Sample assets created successfully!');
        $this->command->info('Total assets: ' . count($assets));
    }
}

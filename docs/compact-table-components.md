# Compact Table Components Documentation

## Overview
Komponen table yang telah dioptimasi untuk tampilan yang lebih compact dan tidak terlalu besar. Dirancang untuk memberikan informasi maksimal dalam ruang minimal dengan tetap mempertahankan readability.

## Key Features

### 🎯 **Compact Design**
- **Smaller Padding**: Padding yang dikurangi untuk efisiensi ruang
- **Optimized Font Sizes**: Font size yang lebih kecil namun tetap readable
- **Minimal Spacing**: Spacing yang efisien tanpa mengorbankan UX
- **Condensed Layout**: Layout yang padat namun terorganisir

### 📱 **Mobile Optimized**
- **Responsive Scaling**: Ukuran yang menyesuaikan dengan device
- **Touch-Friendly**: Tetap mudah digunakan di mobile
- **Horizontal Scroll**: Scroll horizontal yang smooth untuk table lebar

## Components

### 1. **Compact Table** (`<x-compact-table>`)
Table utama dengan design yang lebih compact.

**Props:**
- `headers` (array): Array header kolom
- `searchable` (boolean): Enable search functionality
- `searchPlaceholder` (string): Placeholder text untuk search

**Styling Features:**
- Padding: 8px-12px (vs 16px-24px pada table biasa)
- Font size: 10px-12px (vs 14px-16px pada table biasa)
- Border radius: 8px (vs 16px pada table biasa)
- Minimal shadow dan border

```blade
<x-compact-table
    :headers="['#', 'Name', 'Status', 'Actions']"
    searchable="true"
    searchPlaceholder="Search...">
    <!-- Table content -->
</x-compact-table>
```

### 2. **Compact Table Row** (`<x-compact-table-row>`)
Row dengan hover effect yang subtle.

```blade
<x-compact-table-row>
    <!-- Table cells -->
</x-compact-table-row>
```

### 3. **Compact Table Cell** (`<x-compact-table-cell>`)
Cell dengan padding yang dikurangi.

**Props:**
- `align` (string): Text alignment ('left', 'center', 'right')

**Styling:**
- Padding: 10px-12px (vs 20px-24px)
- Font size: 12px (vs 14px)
- Line height: 1.3 (vs 1.4)

```blade
<x-compact-table-cell align="center">
    Content here
</x-compact-table-cell>
```

### 4. **Compact Status Badge** (`<x-compact-status-badge>`)
Status badge dengan ukuran yang lebih kecil.

**Styling:**
- Font size: 10px (vs 12px)
- Padding: 2px-6px (vs 3px-8px)
- Border radius: 4px (vs 6px)

```blade
<x-compact-status-badge status="active" type="pill">
    Active
</x-compact-status-badge>
```

### 5. **Compact Action Buttons** (`<x-compact-action-buttons>`)
Container untuk action buttons yang compact.

```blade
<x-compact-action-buttons>
    <button class="compact-btn compact-btn-sm compact-btn-warning">
        <i class="fas fa-edit"></i>
    </button>
    <button class="compact-btn compact-btn-sm compact-btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</x-compact-action-buttons>
```

### 6. **Compact Table Avatar** (`<x-compact-table-avatar>`)
Avatar component dengan ukuran yang dikurangi.

**Styling:**
- Size: 24px (vs 32px)
- Font size: 10px (vs 12px)
- Margin: 8px (vs 12px)

```blade
<x-compact-table-avatar 
    :name="$user->name" 
    icon="fas fa-user" 
    color="blue">
    <div class="text-xs text-gray-500">{{ $user->email }}</div>
</x-compact-table-avatar>
```

### 7. **Compact Table Number** (`<x-compact-table-number>`)
Number formatting dengan font yang lebih kecil.

**Styling:**
- Font size: 11px (vs 13px)
- Font family: Monospace untuk consistency

```blade
<x-compact-table-number :value="150000" format="currency" />
```

## Button System

### Button Sizes
```css
.compact-btn-xs  /* 20px height, 10px font */
.compact-btn-sm  /* 24px height, 11px font */
.compact-btn-md  /* 32px height, 12px font */
```

### Button Colors
```css
.compact-btn-primary    /* Green */
.compact-btn-secondary  /* Gray */
.compact-btn-success    /* Green */
.compact-btn-warning    /* Orange */
.compact-btn-danger     /* Red */
.compact-btn-info       /* Blue */
```

### Usage Example
```blade
<button class="compact-btn compact-btn-sm compact-btn-primary">
    <i class="fas fa-plus"></i>
</button>
```

## CSS Classes

### Table Styling
```css
.compact-table          /* Main table container */
.compact-search         /* Search input styling */
.table-number          /* Number formatting */
.table-row-number      /* Row numbering */
.compact-badge         /* Status badges */
```

### Responsive Breakpoints
```css
/* Mobile (≤768px) */
- Header padding: 6px-8px
- Cell padding: 8px
- Font size: 9px-11px

/* Small Mobile (≤480px) */
- Header padding: 4px-6px  
- Cell padding: 6px
- Font size: 8px-10px
```

## Size Comparison

### Standard vs Compact
| Element | Standard | Compact | Reduction |
|---------|----------|---------|-----------|
| Header Padding | 16px-24px | 8px-12px | ~50% |
| Cell Padding | 20px-24px | 10px-12px | ~50% |
| Font Size | 14px-16px | 10px-12px | ~25% |
| Button Height | 36px-40px | 20px-24px | ~40% |
| Avatar Size | 32px-40px | 24px | ~25% |

## Implementation Examples

### Lapangan Management
```blade
<x-compact-table :headers="['#', 'Lapangan', 'Harga', 'Status', 'Aksi']">
    @foreach($lapangan as $index => $item)
        <x-compact-table-row>
            <x-compact-table-cell>{{ $index + 1 }}</x-compact-table-cell>
            <x-compact-table-cell>
                <x-compact-table-avatar :name="$item->nama" icon="fas fa-futbol" />
            </x-compact-table-cell>
            <x-compact-table-cell>
                <x-compact-table-number :value="$item->harga" format="currency" />
            </x-compact-table-cell>
            <x-compact-table-cell>
                <x-compact-status-badge :status="$item->status" />
            </x-compact-table-cell>
            <x-compact-table-cell>
                <x-compact-action-buttons>
                    <button class="compact-btn compact-btn-sm compact-btn-warning">
                        <i class="fas fa-edit"></i>
                    </button>
                </x-compact-action-buttons>
            </x-compact-table-cell>
        </x-compact-table-row>
    @endforeach
</x-compact-table>
```

## Best Practices

### 1. **When to Use Compact Tables**
- Dashboard dengan banyak data
- Admin panels dengan space terbatas
- Mobile-first applications
- Data-heavy interfaces

### 2. **Accessibility**
- Maintain minimum 44px touch targets untuk mobile
- Ensure sufficient color contrast
- Use proper ARIA labels
- Support keyboard navigation

### 3. **Performance**
- Use pagination untuk large datasets
- Implement virtual scrolling jika diperlukan
- Optimize images dan icons

### 4. **Content Guidelines**
- Keep text concise
- Use icons untuk actions
- Prioritize important information
- Use tooltips untuk additional context

## Migration from Standard Tables

### Step 1: Replace Components
```blade
<!-- Before -->
<x-table> → <x-compact-table>
<x-table-row> → <x-compact-table-row>
<x-table-cell> → <x-compact-table-cell>

<!-- After -->
<x-compact-table>
    <x-compact-table-row>
        <x-compact-table-cell>
```

### Step 2: Update Button Classes
```blade
<!-- Before -->
<button class="btn btn-sm btn-primary">

<!-- After -->
<button class="compact-btn compact-btn-sm compact-btn-primary">
```

### Step 3: Adjust Content
- Shorten text labels
- Use icons instead of text where possible
- Remove unnecessary spacing
- Optimize image sizes

## Browser Support
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile browsers dengan proper responsive handling

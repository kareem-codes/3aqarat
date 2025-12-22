export default function Select({
    label,
    error,
    options = [],
    className = '',
    required = false,
    placeholder = 'اختر...',
    ...props
}) {
    return (
        <div className="w-full">
            {label && (
                <label className="block text-sm font-semibold text-slate-700 mb-2">
                    {label}
                    {required && <span className="text-red-500 mr-1">*</span>}
                </label>
            )}
            <select
                className={`w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-slate-400 focus:border-slate-400 transition outline-none appearance-none bg-white ${
                    error ? 'border-red-500' : 'border-slate-200'
                } ${className}`}
                {...props}
            >
                <option value="">{placeholder}</option>
                {options.map((option) => (
                    <option key={option.value} value={option.value}>
                        {option.label}
                    </option>
                ))}
            </select>
            {error && <p className="text-red-500 text-sm mt-1">{error}</p>}
        </div>
    );
}

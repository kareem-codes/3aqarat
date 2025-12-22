export default function Textarea({
    label,
    error,
    className = '',
    required = false,
    rows = 4,
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
            <textarea
                rows={rows}
                className={`w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-slate-400 focus:border-slate-400 transition outline-none resize-none ${
                    error ? 'border-red-500' : 'border-slate-200'
                } ${className}`}
                {...props}
            />
            {error && <p className="text-red-500 text-sm mt-1">{error}</p>}
        </div>
    );
}

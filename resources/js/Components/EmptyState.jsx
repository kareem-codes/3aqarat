export default function EmptyState({ 
    icon: Icon, 
    title, 
    description, 
    action,
    className = '' 
}) {
    return (
        <div className={`flex flex-col items-center justify-center py-16 px-4 text-center ${className}`}>
            {Icon && (
                <div className="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <Icon className="w-10 h-10 text-gray-400" />
                </div>
            )}
            {title && <h3 className="text-xl font-bold text-gray-900 mb-2">{title}</h3>}
            {description && <p className="text-gray-600 mb-6 max-w-md">{description}</p>}
            {action}
        </div>
    );
}

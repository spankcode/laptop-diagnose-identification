import DashboardLayout from "@/Layouts/DashboardLayout";
import { Head, usePage } from "@inertiajs/react";
import React from "react";
import ModalMessage from "../../Components/ModalMessage";

export default function Index() {
    const { auth, flash } = usePage().props;
    const [showMessageModal, setShowMessageModal] = React.useState(false);
    const user = auth.user;

    React.useEffect(() => {
        if (flash.success) {
            setShowMessageModal(true);
        } else {
            setShowMessageModal(false);
        }
    }, [flash.success]);

    return (
        <>
            <Head title="Dashboard" />
            <DashboardLayout user={user}>
                <div className="py-4 md:py-6">
                    <div className="max-w-full mx-auto">
                        <div className="bg-white overflow-hidden shadow-sm rounded-lg">
                            <div className="p-6 text-gray-900">
                                Wellcome back{" "}
                                <span className="text-indigo-500 font-semibold">
                                    {user.name}
                                </span>
                                !
                            </div>
                        </div>
                    </div>
                </div>
                <ModalMessage
                    message={`${flash.success}, Menggunakan akun ${user.name}!`}
                    type="success"
                    show={showMessageModal}
                    onClose={() => setShowMessageModal(false)}
                />
            </DashboardLayout>
        </>
    );
}

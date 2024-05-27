import React from "react";
import Checkbox from "@/Components/Checkbox";
import GuestLayout from "@/Layouts/MainLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, useForm, usePage } from "@inertiajs/react";
import ModalMessage from "../../Components/ModalMessage";

export default function Login({ status }) {
    const { flash } = usePage().props;
    const [showMessageModal, setShowMessageModal] = React.useState(false);
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    React.useEffect(() => {
        if (flash.error) {
            setShowMessageModal(true);
        } else {
            setShowMessageModal(false);
        }

        return () => {
            reset("password");
        };
    }, [flash.error, errors]);

    const submit = (e) => {
        e.preventDefault();

        post(route("login"));
    };

    return (
        <GuestLayout>
            <Head title="Login" />

            {status && (
                <div className="mb-4 font-medium text-sm text-green-600">
                    {status}
                </div>
            )}
            <div className="flex flex-col gap-4">
                <div className="text-center">
                    <h1 className="font-bold text-2xl md:text-3xl">Login</h1>
                </div>
                <div className="border-b my-4 boreder-px border-zinc-200" />
                <form onSubmit={submit}>
                    <div>
                        <InputLabel htmlFor="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData("email", e.target.value)}
                        />

                        <InputError message={errors.email} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full"
                            autoComplete="current-password"
                            onChange={(e) =>
                                setData("password", e.target.value)
                            }
                        />

                        <InputError
                            message={errors.password}
                            className="mt-2"
                        />
                    </div>

                    <div className="block mt-4">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                checked={data.remember}
                                onChange={(e) =>
                                    setData("remember", e.target.checked)
                                }
                            />
                            <span className="ms-2 text-sm text-gray-600">
                                Remember me
                            </span>
                        </label>
                    </div>

                    <div className="flex items-center justify-end mt-4">
                        <PrimaryButton className="ms-4" disabled={processing}>
                            Login
                        </PrimaryButton>
                    </div>
                </form>
            </div>
            <ModalMessage
                message={flash.error}
                type="error"
                show={showMessageModal}
                onClose={() => setShowMessageModal(false)}
            />
        </GuestLayout>
    );
}

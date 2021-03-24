import React, {useState, useEffect} from 'react';
import axios from 'axios';

const Settings = () => {

    const [token, setToken] = useState('')
    const url = `${appLocalizer.apiUrl}/mcsh/settings`;
    const [loader, setLoader] = useState('Save Token')

    useEffect(() => {
        axios.get(url).then((res) => {
            if (res.status === 200) {
                setToken(res.data.token)
            }
        })
    }, [])

    const handleSubmit = e => {
        e.preventDefault();
        setLoader('Saving...')
        axios.post(url, {
            token
        }, {
            headers: {
                'content-type': 'application/json',
                'X-WP-NONCE': appLocalizer.nonce
            }
        }).then((res) => {
            setLoader('Saved')
        })
    }


    return (
        <form id="settings-form" onSubmit={(e) => handleSubmit(e)}>
            <table className="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <label htmlFor="token"> Enter Token </label>
                        
                    </th>
                    <td>
                        <input id="token" name="token" value={token} className="regular-text" onChange={(e) => setToken(e.target.value)}/>
                    </td>
                </tr>

            </tbody>

            </table>
            <p className="submit">
                <button className="button button-primary" type="submit">{loader}</button>
            </p>
            
        </form>
    )
}

export default Settings;